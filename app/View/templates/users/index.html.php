{include file="../header.html.php"}
<div class="image-container set-full-height" style="background-image: url({$router->publicWeb('images/background.jpg')})">
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
		                    <form action="" method="" autocomplete="off">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
		                    		<img src="{$router->publicWeb('images/logo.png')}">
		                        	<h3 class="wizard-title">
		                        		Panel obywatelski
		                        	</h3>
		                    	</div>
								<div class="wizard-navigation">
									<ul id="navTab">
			                            <li class="active"><a href="#login" data-toggle="tab">Krok 1</a></li>
			                            <li><a>Krok 2</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane active" id="login">
		                            	<div class="row">

			                            	<div class="col-sm-12">
			                            		<div class="time-info">
													<h5 class="text-center"><b>Serdecznie zapraszamy do udziału w&nbsp;panelu obywatelskim<br/> „Co zrobić aby oddychać czystym powietrzem w&nbsp;Lublinie?”</b></h5>

													<p>Jeżeli zdecydował/a się Pan/Pani na wzięcie udziału w&nbsp;panelu i&nbsp;zgłoszenie się do ostatecznego losowania, prosimy o&nbsp;przygotowanie otrzymanego pocztą zaproszenia wraz z&nbsp;kodem identyfikacyjnym znajdującym się w&nbsp;prawym górnym rogu.  
													<br/><br/>
													Rejestracja przez Internet jest otwarta od <span class="date">{$registerConfig.start}</span>, do <span class="date">{$registerConfig.end}</span>, do godziny 23:59.<br/><br/>
													Więcej informacji o&nbsp;panelu obywatelskim w&nbsp;Lublinie jest dostępnych na <a href="www.lublin.eu/panel">www.lublin.eu/panel</a>.<br/><br/>
													</p>
												</div>
			                            	</div>

		                            	{if isset($allowLogin) OR $allowLogin}
		                                	<div class="col-sm-12 login-form">
		                                		<div class="col-sm-6">
		                                			<h4 style="text-align: center;"> Rejestracja</h4>
		                                			<div class="input-group">
														<span class="input-group-addon">
															<i class="fas fa-user"></i>
														</span>
														<div class="form-group label-floating">
				                                          	<label class="control-label">Imię</label>
				                                          	<input name="firstname" type="text" class="form-control">
				                                        </div>
													</div>
		                                			<div class="input-group">
														<span class="input-group-addon">
															<i class="fas fa-lock"></i>
														</span>
														<div class="form-group label-floating">
				                                          	<label class="control-label">Kod identyfikacyjny*</label>
				                                          	<input name="pass" type="password" class="form-control" autocomplete="new-password" aria-required="true">
				                                        </div>
													</div>
			                                	</div>
			                                </div>

			                                <div class="col-sm-12">
												<span class="adnotation">*Kod identyfikacyjny znajduje się w&nbsp;prawym górnym rogu w&nbsp;liście otrzymanym pocztą</span>
											</div>

			                                <div class="col-sm-12">
					                            <div class="tab-pane active" id="schedule">
													<div class="important-checkbox">
														<div class="checkbox">
														    <label>
															    <input type="checkbox" name="">
														    </label>
														    <span>Oświadczam, że mogę wziąć udział we wszystkich spotkaniach panelu obywatelskiego, które odbędą się w&nbsp;następujących terminach:</span>
													    </div>
													</div>
					                                <div class="row">
					                                    <div class="col-sm-10">
					                                        <div class="col-sm-12">
					                                        	<ul class="dl-list">
						                                        	{foreach from=$deadlines item=deadline}
						                                            <li>
																	    {$deadline.value}
																    </li>
																    {/foreach}
																</ul>
					                                        </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>

			                                {/if}
		                            	</div>
		                            </div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-fill btn-success btn-wd login-button' name='Login' value="Zaloguj"/>
	                                </div>
	                                <div class="pull-left footer-contact">
	                                	<span>
		                                	Kontakt telefoniczny: 81 466 19 00<br/>
											Email: obywatelski@lublin.eu 
										</span>
	                                </div>
	                                <div class="clearfix"></div>
	                        	</div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container xd -->
	</div>

	<script type="text/javascript">
		moment.locale('pl');

		function login(firstname, pass, dl){
		    $.ajax({
		        method:'POST',
		        url:'{$router->makeUrl("users/login")}',
		        data: {
		            firstname: firstname,
		            pass_code: pass,
		            deadlines: dl
		        },
		        cache: false,
		        success:function(response){
		            console.log(response)
		            if(response.code == 200){
		            	toastr.success(response.response);
		            	location.reload();
		            }
		        },
		        error:function(response){
		        	$.each(response.responseJSON.errors, function(key, error){
	            		toastr.error(error)
	            	})
		        }
		    })
		}

		$( document ).ready(function() {
	    	var deadlines;
			var bday_cred;
	    	var pass_cred;

			$('.loading').remove();

		    $('.login-button').click(function(){
		    	deadlines = $('form').find('input[type="checkbox"]').prop('checked');
				firstname_cred = $('form').find('input[name="firstname"]').val();
		    	pass_cred = $('form').find('input[name="pass"]').val();

				login(firstname_cred, pass_cred, deadlines);
		    })

		    $.each($('.dl-list').find('li'), function(key, value){
		    	$(value).html(moment($(value).html().replace(/\s/g, '')).format('Do MMMM YYYY').replace('.', ''));
		    })

		    $.each($('.date'), function(key, value){
		    	$(value).html(moment($(value).html().replace(/\s/g, '')).format('D MMMM').replace('.', ''));
		    })
		});
	</script>


{include file="../footer.html.php"}