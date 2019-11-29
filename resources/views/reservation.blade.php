  <form class="reservation-form" method="post" action="{{url('/reservation/now')}}">
			@csrf
         <div class="row">
             <div class="col-md-6 col-sm-6">
                 <div class="form-group">
                     <input type="text" class="form-control reserve-form empty iconified" name="name" id="name" required="required" placeholder="  &#xf007;  Name">
                                            </div>
                       <div class="form-group">
                        <input type="email" name="email" class="form-control reserve-form empty iconified" id="email" required="required" placeholder="  &#xf1d8;  e-mail">
                                            </div>
                                        </div>

                 <div class="col-md-6 col-sm-6">
                     <div class="form-group">
                             <input type="tel" class="form-control reserve-form empty iconified" name="phone" id="phone" required="required" placeholder="  &#xf095;  Phone">
                                            </div>
                       <div class="form-group">
                         <input type="text" class="form-control reserve-form empty iconified" name="datepicker" id="datepicker" placeholder="&#xf017;  Time">
                                            </div>
                                        </div>

                 <div class="col-md-12 col-sm-12">
                       <textarea type="text" name="message" class="form-control reserve-form empty iconified" id="message" rows="3" required="required" placeholder="  &#xf086;  We're listening"></textarea>
                                        </div>

            <div class="col-md-12 col-sm-12">
                     <button type="submit" id="submit" name="submit" class="btn btn-reservation">
                            <span><i class="fa fa-check-circle-o"></i></span>
                                                Make a reservation
                                            </button>
                                        </div>
                                            
                                    </div>
                                </form>