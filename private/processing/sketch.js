
var website;

function setup(){


	createCanvas(600, 300);
	background(255);
	frameRate(5);



}

function draw(){


	
	


	



}

function drawMyWebsite(){

	var websiteUrl = document.getElementById("website").value;
	website = websiteUrl;
	console.log(websiteUrl);
	
	
	var src = fetch(websiteUrl);
	console.log(src);



	fetch(websiteUrl)
    .then(function (response) {
        switch (response.status) {
            // status "OK"
            case 200:
                return response.text();
            // status "Not Found"
            case 404:
                throw response;
        }
    })
    .then(function (template) {
        console.log(template);
    })
    .catch(function (response) {
        // "Not Found"
        console.log(response.statusText);
    });
	var src = fetch(websiteUrl);
	console.log(src);
	website = src;
	
	showWebsite();
}

function showWebsite(){

	stroke(0); 

	const str = 'abcdefghijklmnopqrstuvwxyz';
	for( let i = 0; i < 200; i++){
		for ( let j = 0; j < 200;j++){
			textSize(20);
			text(website[i], 10 + i * 15, 30);
			ellipse(random(200, 300), random(200, 300), 10, 10);	
		}
	}
}