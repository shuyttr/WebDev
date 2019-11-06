{
  let xhr;
  function getJSONasync(url, handler, errorHandler) {
	xhr = new XMLHttpRequest();
	xhr.addEventListener("load", handler);
	xhr.addEventListener("error", errorHandler);
	if (!xhr) {
	  alert('Giving up :( Cannot create an XMLHTTP instance');
	  return false;
	}
	xhr.open('GET', url, true);
	xhr.send();
  }
  
  function showContents() {
	const context = modifyContext(JSON.parse(xhr.responseText));//parse json into a javascript object
	//create the columns here?
	//edit the context variable to have 2 rows of reviews not just one
	const template = document.querySelector("#movietemplate").innerHTML;//get the handlebars template
	const templateScript = Handlebars.compile(template);//compile the handlebars template
	const html = templateScript(context);//html created from handlebars template
	document.querySelector("body").innerHTML = html;
  }

  function loadTemplate() {
	const movieName = window.location.search.substr(6);
	if (movieName === "") {
    	    alert("No movie name given.  Re-read instuctions.");
    	    return;
	}
	const hbtext = xhr.responseText;
	document.querySelector("#movietemplate").innerHTML = hbtext;
        const contextName = movieName + "/info.json";
	getJSONasync(contextName, showContents, warnError);
  }
    
  function warnError() {
		// needs a more appropriate warning			    
		alert('There was a problem with the request.');
  }
  
  function modifyContext(context) {
     /* this is where you put your code for any local modifications
        of the JSON context object before you return it */
	const reviews = context.reviews;//put the JSON reviews into the a javascript object
	//get the amount of reviews for the footer
	context.review_length = reviews.length;
	
	//iterate thru the reviews array and put them in the respective column
	
	//add these columns to the context javascript object
	//reviews.column1 = column_1;
	//reviews.column2 = column_2;
	
	//get the image
	if (context.rating > 60){
		context.rating_picture = "fresh";
	}
	else{
		context.rating_picture = "rotten";
	}
	
	//make 2 columns and half the amount of reviews goes into each
	var right_col = [];
	var left_col = [];
	
	//iterate thru each element and add to respective column
	var j = 0;
	var k = 0;
	for (var i = 0; i < reviews.length; i++){
		if(i % 2 == 0){
			left_col[j++] = reviews[i];
		}
		else{
			right_col[k++] = reviews[i];
		}
	}
	
	//add those columns to the javascript object
	context.left_column = left_col;
	context.right_column = right_col;
	context.shortcut = window.location.search.substr(6);
    return context;
  }
  
  function renderTemplate() {
      const templateName = "movie.hb";
      getJSONasync(templateName, loadTemplate, warnError);
  }
  window.addEventListener("load", renderTemplate);

}
