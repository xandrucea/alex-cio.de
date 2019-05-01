// initialize script with start function
// https://developers.google.com/api-client-library/javascript/start/start-js

function start(){
	// initialize the js client library
	gapi.client.init({
		'apiKey' : 'AIzaSyA10hDddZNQXKhY3smN7efbHvpjDv0_fVE', 
		
		// add api key to discovery documents urls
		// 'discoveryDocs' : ['https://people.googleapis.com/$discovery/rest'],

		'clientId' : 'youtubediscovery-176920.apps.googleusercontent.com',
		'scope': 'profile',
	}).then( function (){
		// Initialize and make the api request
		// return gapi.client.people.people.get({
		// 	'resourceName': 'people/me',
		// 	'requestMask.includesField' : 'person.name'

		// })

		return gapi.client.request({
			'path': 'https://people.googleapis.com/v1/people/me?requestMask.includeField=person.names',
		})


	}).then( function (response) {
		console.log(response.result);

	}, function(reason) {
		console.log('Error: ' + reason.result.error.message);
	});
}

// 1. load the javascript client library
gapi.load('client', start);

function onClientLoad(){
	
}