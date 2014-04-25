//
//	jQuery Validate example script
//
//	Prepared by David Cochran
//
//	Free for your use -- No warranties, no guarantees!
//

$(document).ready(function(){

	// Validate
	// http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	// http://docs.jquery.com/Plugins/Validation/
	// http://docs.jquery.com/Plugins/Validation/validate#toptions

	// Use the twitter bootstrap styles for an inline error message
	// This prevents the screen jumping that occurs with the non-inline jQuery Validate styles
	jQuery.validator.setDefaults({
		errorClass : "help-block"
	});

		$('#voter-form').validate({
	    rules: {
	      nameVoter: {
	        minlength: 2,
	        required: true
	      },
	      emailVoter: {
	        required: true,
	        email: true
	      },
	      surNameVoter: {
	      	minlength: 2,
	        required: true
	      },
	      fNameVoter: {
	        minlength: 2,
	        required: true
	      },
	      addressVoter: {
	        minlength: 2,
	        required: true
	      },
	      datev: {
	  	        required: true
	      },
	      cityVoter: {
	        minlength: 2,
	        required: true
	      },
	      mnumberVoter: {
	      	number:true,
	        minlength: 10,
	        maxlength:10,
	        required: true
	        
	      },
	      voterPhoto: {
	        required: true
	      },
	      voterProof: {
	        required: true
	      },
	   GenderV: {
	        required: true
	      },
	      wardVoter: {
	        minlength: 1,
	        required: true
	      }
	    }
	    ,
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('has-error').addClass('has-success');
			}
	  });

jQuery.validator.setDefaults({
		errorClass : "help-block"
	});
	$('#candidate-form').validate({
	    rules: {nameCandid: {
	        minlength: 2,
	        required: true
	      },
	      emailCandid: {
	        required: true,
	        email: true
	      },
	      surNameCandid: {
	      	minlength: 2,
	        required: true
	      },
	      fNameCandid: {
	        minlength: 2,
	        required: true
	      },
	      addressCandid: {
	        minlength: 2,
	        required: true
	      },
	      dateC: {
	  	        required: true
	      },
	      cityCandid: {
	        minlength: 2,
	        required: true
	      },
	      mnumberCandid: {
	      	number:true,
	        minlength: 10,
	        maxlength:10,
	        required: true
	        
	      },
	      CandidPhoto: {
	        required: true
	      },
	   GenderC: {
	        required: true
	      },

	      
	      candidateProof: {
	        required: true
	      },
	      wardCandid: {
	        minlength: 1,
	        required: true
	      }
	    },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('has-error').addClass('has-success');
			}

});























jQuery.validator.setDefaults({
		errorClass : "help-block"
	});
	$('#login-form').validate({
	    rules: {Id: {
	        minlength: 2,
	        required: true
	      },
	      inputPass: {
	        required: true
	      },
	      
	   		logintype: {
	        required: true
	      }
	      
	    },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('has-error').addClass('has-success');
			}

});













	jQuery.validator.setDefaults({
		errorClass : "help-block"
	});
	$('#result-form').validate({
	    rules: {
	      
	   		byCD: {
	        required: true
	      },

	      byState: {
	        required: true
	      },

	      byWno: {
	        required: true
	      },

	      
	    },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('has-error').addClass('has-success');
			}

});




	jQuery.validator.setDefaults({
		errorClass : "help-block"
	});
	$('#bth-setting-form').validate({
	    rules: {
	      
	   		oldPass: {
	        required: true
	      },

	      newPass: {
	        required: true
	      },

	      
	    },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('has-error').addClass('has-success');
			}

});


//lost password validation

jQuery.validator.setDefaults({
		errorClass : "help-block"
	});
	$('#lost-form').validate({
	    rules: {
	      
	   		lostVoterID: {
	        required: true
	      },

	     

	 },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('has-error').addClass('has-success');
			}

});


//delete booth

jQuery.validator.setDefaults({
		errorClass : "help-block"
	});
	$('#delete-booth').validate({
	    rules: {
	      
	   		searchBooth: {
	        required: true
	      },

	     

	 },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('has-error').addClass('has-success');
			}

});


//booth create 

jQuery.validator.setDefaults({
		errorClass : "help-block"
	});
	$('#create-booth').validate({
	    rules: {
	      
	   		nameSuper: {
	        minlength: 2,
	        required: true
	      },

	      addressSuper: {
	        minlength: 2,
	        required: true
	      },

	      mnumberSuper: {
	        minlength: 10,
	        required: true
	      },

	       wardSuper: {
	        minlength: 2,
	        required: true
	      },

	       passwordSuper: {
	        minlength: 2,
	        required: true
	      },

	       emailSuper: {
	       
	        required: true
	      },



	      
	    },
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.form-group').removeClass('has-error').addClass('has-success');
			}

});

}); // end document.ready