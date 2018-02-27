{include file="../header.html.php"}
<div class="image-container set-full-height" style="background-image: url('http://demos.creative-tim.com/material-bootstrap-wizard/assets/img/wizard-book.jpg')">
	<a href="#">
        <div class="logo-container">
            <div class="logo">
                <img src="{$router->publicWeb('images/logo2.png')}">
            </div>
        </div>
    </a>
	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		        	
		            <!-- Wizard container -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="blue" id="wizard">
		                	<div class="loading">
				        		<i class="fas fa-spinner rotating"></i>
				        	</div>
		                    <form action="" method="">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Panel obywatelski
		                        	</h3>
		                    	</div>
								<div class="wizard-navigation">
									<ul id="navTab">
			                            <li><a>Logowanie</a></li>
			                            <li class="active"><a href="#personalData" data-toggle="tab">Dane osobowe</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane active" id="personalData">
		                                <div class="row">
		                                    <h4 class="info-text"> <b>Prosimy o podanie następujących informacji:</b></h4>
		                                    <div class="col-sm-6">
		                                    	<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-envelope"></i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Adres email</label>
			                                          	<input name="email" type="text" class="form-control">
			                                        </div>
												</div>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fas fa-mobile"></i>
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Numer telefonu</label>
			                                          	<input name="phone" type="text" class="form-control">
			                                        </div>
												</div>
		                                    	<label>Płeć</label>
	                                    		<div class="radio">
												    <label>
													    <input type="radio" name="gender" value="male">
												    </label>
												    Mężczyzna
											    </div>
											    <div class="radio">
												    <label>
													    <input type="radio" name="gender" value="female">
												    </label>
												    Kobieta
											    </div>
		                                    </div>
		                                    <div class="col-sm-6">
		                                    	<label>Wykształcenie</label>
		                                    	<div class="radio">
												    <label>
													    <input type="radio" name="education" value="group1">
												    </label>
												    Podstawowe, gimnazjalne, inne
											    </div>
											    <div class="radio">
												    <label>
													    <input type="radio" name="education" value="group2">
												    </label>
												    Średnie, policealne, kolegium, zawodowe
											    </div>
											    <div class="radio">
												    <label>
													    <input type="radio" name="education" value="group3">
												    </label>
												    Wyższe
											    </div>												
		                                    </div>
		                                    <div class="col-sm-12">
		                                    	<div class="form-group">
		                                            <label>Specjalne potrzeby dotyczące diety</label>
		                                            <textarea class="form-control" name="custom-need" placeholder="" rows="3"></textarea>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-12">
		                                    	<div class="checkbox">
												    <label>
													    <input type="checkbox" name="confirm-privacy">
												    </label>
												    Wyrażam zgodę na przetwarzanie moich danych osobowych na potrzeby organizacji panelu obywatelskiego w&nbsp;Lublinie, zgodnie z&nbps;ustawą xxyyzz
											    </div>
											    <div class="under-text">
			                                		<span class="info-text">
			                                		Administratorem danych osobowych jest Prezydent Miasta Lublin, pl. Króla Władysława Łokietka 1, 20-109 Lublin.<br/>
												    Celem zbierania danych jest wdrożenie i&nbsp;realizacja Budżetu Obywatelskiego w Lublinie.<br/>
												    Mam prawo dostępu do treści swoich danych oraz ich poprawiania.<br/>
												    Podanie danych osobowych jest dobrowolne.</span>
			                                	</div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-fill btn-success btn-wd finish-form' name='finish' value='Finish' />
	                                </div>
	                                <div class="pull-left">
	                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />

<!-- 										<div class="footer-checkbox">
											<div class="col-sm-12">
											  <div class="checkbox">
												  <label>
													  <input type="checkbox" name="optionsCheckboxes">
												  </label>
												  Subscribe to our newsletter
											  </div>
										  </div>
										</div> -->
	                                </div>
	                                <div class="clearfix"></div>
	                        	</div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->
	</div>

	<script type="text/javascript">
		function validateEmail($email) {
			{literal}
		  	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  	{/literal}
		  	return emailReg.test( $email );
		}

		function validateForm() {
			email = $('form').find('input[name="email"]').val()
			phone = $('form').find('input[name="phone"]').val()
			gender = ($('input[name=gender]:checked', 'form').val());
			education = ($('input[name=education]:checked', 'form').val())
			customNeed = $('form').find('textarea[name="custom-need"]').val()
			confirmPrivacy = $('form').find('input[name="confirm-privacy"]').prop('checked')

			{literal}
			if(email == '' || !validateEmail(email))
				return {return:false, msg:'Nie podano email-u lub jest niepoprawny!'}

			if(phone == '' || isNaN(phone))
				return {return:false, msg:'Nie podano numeru telefonu lub jest niepoprawny!'}

			if(gender === undefined)
				return {return:false, msg:'Nie sprecyzowano płci!'}

			if(education === undefined)
				return {return:false, msg:'Nie sprecyzowano wykształcenia!'}

			if(!confirmPrivacy)
				return {return:false, msg:'Nie wyrażono zgody na przetwarzanie danych osobowych!'}
			
			return {return:true}
			{/literal}
		}

		$( document ).ready(function() {
			var email;
			var phone;
			var gender;
			var education;
			var customNeed;
			var confirmPrivacy;

			$('.loading').remove();

			$('.finish-form').click(function(){
				let response = validateForm()
				
				if(response.return)
					console.log('ok')
				else
					toastr.error(response.msg)
			});
		});
	</script>
{include file="../footer.html.php"}