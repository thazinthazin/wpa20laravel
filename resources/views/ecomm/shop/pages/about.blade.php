@extends('ecomm.shop.layouts.shopstyle')
@section('content')
@include('ecomm.partials.shop1.top_info')
@include('ecomm.partials.shop1.header')
@include('ecomm.partials.shop1.breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('about')])
<section class="light_section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="widget widget_text">
					<h3>Shortly About Us</h3>					

					<p>
						Myanmar Links Class Wpa-20 အေနျဖင့္ တည္ေဆာက္မည့္ Web Site ေရြးခ်ယ္ရာတြင္ E-commerce Site ကိုေရြးခ်ယ္ခဲ့ပါသည္။
						AliExpress Web Site အား Survey အေနျဖင့္ ေလ့လာခဲ့ၾကၿပီး ယခု<br>တည္ေဆာက္ထားေသာ Web-Site အား Database Structure 
						ခ်ခဲ့ၾကပါသည္။ Laravel Framework စသင္ေသာ အခါ Web Page အားတျဖည္းျဖည္းတည္ေဆာက္ခဲ့ၾကၿပီး သင္တန္းၿပီးဆုံးၿပီး
						ၾကားရက္မ်ားတြင္ <br>သင္တန္းသို႔ အဖြဲ႕လိုက္လာေရာက္ၿပီး Front End နဲ႔ Back End မ်ားကို အတူတကြေရးသားခဲ့ပါသည္။
						Team Leader Group မွ ေန၍ အျခားအဖြဲ႕၀င္မ်ားႏွင့္အတူ  ၁ လ အၾကာတြင္ Project အားအေခ်ာသတ္ႏုိင္ခဲ့<br>ၾကပါသည္။
					</p>

					<div class="row">
						<div class="col-sm-6">
						<h5>Steps By Steps Creation</h5>
							<ol class="list3">
								<li>Categories And SubCategories Create</li>
								<li>Products Create</li>
								<li>User/Admin Create And Login/Logout Method</li>
								<li>Admin Panel Create</li>
								<li>Cart, WishList and Order Create</li>
								<li>Contact with Mailgun Create</li>								
							</ol>
							<h5>Additional Creation</h5>
							<ol>
								<li>Colors And Sizes For Products</li>
								<li>Add Cart Amount Can be Change</li>
								<li>Admin Upload Manager</li>
								<li>Search Box</li>
								<li>Filter Products</li>
							</ol>
						</div>

						<div class="col-sm-6">
						<h5>Using Depenicies</h5>
							<ul class="list1">
							<li>mailgun</li>
							<li>cartalyst/sentinel</li>
							<li>laravel/socialite</li>
							<li>laravelcollective/html</li>
							<li>guzzlehttp/guzzle</li>
							<li>davejamesmiller/laravel-breadcrumbs</li>
							<li>intervention/image</li>
							<li>dflydev/apache-mime-types</li>
							</ul>

						</div>

					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<hr class="divider40">

			<div class="col-lg-6">
				<div class="widget widget_text">
					<h3>How Our Team Learn?</h3>

					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="active"><a href="#tab1" role="tab" data-toggle="tab"><i class="rt-icon-light-bulb"></i> Resources</a></li>
						<li><a href="#tab2" role="tab" data-toggle="tab"><i class="rt-icon-book3"></i> Learning Books</a></li>						
						<li><a href="#tab3" role="tab" data-toggle="tab"><i class="rt-icon-users"></i>Our Team</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane fade  in active" id="tab1">
							<ul>
							<h4>We Use This Resources</h4>
							<li>Sentinel Documention</li>
							<li>Laravel Documention</li>
							<li>Building A Shop With Laravel <strong>Google Search</strong></li>
							<li>CRUD with Laravel <strong>Google Search</strong></li>
							<li>Use So Many Sources From <strong>Google Search</strong></li>						
							</ul>

						</div>
						<div class="tab-pane fade" id="tab2">
							<ul>
								<h4>We Read And Do This Pratical Books</h4>
								<li>Laravel 5.1 Beauty</li>
								<li>Easy Laravel</li>
							</ul>
							
							

						</div>						
						<div class="tab-pane fade" id="tab3">					
							<h5>Leading Team</h5>
							<table class="table">
							<thead>
								<th>Name</th>								
								<th class="text-right">Phone No</th>
							</thead>
								<tbody>
								<tr>								
									<td>Moe Nat Min</td>									
									<td class="text-right">09-31272525</td>
								</tr>
								<tr>
									<td>Su Sandar Aung</td>									
									<td class="text-right">09-795623640</td>
								</tr>
								<tr>
									<td>Kay Khine Nyein</td>									
									<td class="text-right"></td>
								</tr>
								<tr>
									<td>Thazin Htun</td>									
									<td class="text-right">09-975396017</td>
								</tr>
								</tbody>
							</table>			
					
							<h5>Supporting Team</h5>
							<li>Shwe Sin Oo</li>
							<li>Mi Mi Zin</li>
							<li>Nyein Chan Su</li>
							<li>Soe Soe Myint</li>
													

						</div>
					</div>
				</div>

			</div>

			<div class="col-lg-6">
				<div class="widget widget_text">
					<h3>Our Services</h3>
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
										<i class="rt-icon-chat2"></i> Web Design And Information Architechture
									</a>
								</h4>
							</div>
							<div id="collapse1" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Online ေပၚတြင္ သက္ဆိုင္ရာ အခ်က္အလက္မ်ားကို လူအမ်ားစိတ္၀င္စားေအာင္ဖန္တီး<br>တည္ေဆာက္ၿပီး Web Design ျပန္လည္ေရးသားေပးျခင္း ၀န္ေဆာင္မႈ</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
										<i class="rt-icon-briefcase"></i> Build Web Application With Laravel
									</a>
								</h4>
							</div>
							<div id="collapse2" class="panel-collapse collapse in">
								<div class="panel-body">
									<p>Laravel Framework ကို အသုံးျပဳၿပီး ကိုယ္ပိုင္ CMS တည္ေဆာက္ၿပီး Online Sales and Marketing ျပဳလုပ္ေပးေသာ ၀န္ေဆာင္မႈ</p>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
										<i class="rt-icon-grid"></i> Strong Business With Web Development
									</a>
								</h4>
							</div>
							<div id="collapse3" class="panel-collapse collapse">
								<div class="panel-body">
									<p>တည္ေဆာက္ၿပီးသား Web Page ကို အသက္၀င္ေအာင္ လူ အသုံးမ်ားေအာင္ Socail Marketing ျပဳလုပ္ျခင္း၊ Mobile App မ်ား ျပန္လည္ေရးသားျခင္း  အျခား Update and Upgrade မ်ားျပဳလုပ္ျခင္း ႏုိင္ငံတကာအထိ ၀င္ဆံ့ႏုိင္ေသာ အေျခအေနမ်ားျဖစ္ေအာင္<br>ျပဳလုပ္ျခင္း ၀န္ေဆာင္မႈ</p>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>



		</div>
	</div>
</section>

<section class="light_section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2 class="section_header">Our Team</h2>
				<blockquote>
					<h3>Our Team Quote</h3>
					<p>တကယ္ျဖစ္ခ်င္္တကယ္လုပ ္အဟုတ္ျဖစ္ရမည္။</p>
				</blockquote>
			</div>

		</div>
		<div class="row">

			<div class="col-sm-6 col-md-3">

				<div class="thumbnail">
					<img src="/uploads/creater_image/moenat.jpg" height="500" alt="insert pattern">
					<div class="caption">
						<p>Creative, Independence</p>
						<p>Works At - Freelancer</p>
						<p class="text-center team-social">
							<a class="socialico-facebook" href="https://www.facebook.com/burmamoenatmin" title="Facebook" data-toggle="tooltip">#</a>
							<a class="socialico-linkedin" href="https://www.linkedin.com/profile/view?id=AAIAAASo-owBMZ4iIWvao3GtUVpJrtdCg02bo4w&trk=nav_responsive_tab_profile" title="Linkedin" data-toggle="tooltip">#</a>
							<a class="socialico-google" href="https://github.com/moenatmin" title="Github" data-toggle="tooltip">#</a>
						</p>
					</div>
				</div>
				<h3>Moe Nat Min</h3>
				<p>Team Leader</p>

			</div>

			<div class="col-sm-6 col-md-3">

				<div class="thumbnail">
					<img src="/uploads/creater_image/susandar.jpg" alt="">
					<div class="caption">
						<p>Creative, Independence</p>
						<p>Works At - Freelancer</p>
						<p class="text-center team-social">
							<a class="socialico-facebook" href="https://www.facebook.com/joko.san1" title="Facebook" data-toggle="tooltip">#</a>							
							<a class="socialico-google" href="https://github.com/SuSandarAung" title="Github" data-toggle="tooltip">#</a>
						</p>
					</div>
				</div>
				<h3>Su Sandar Aung</h3>
				<p>Co-Team Leader</p>

			</div>

			<div class="col-sm-6 col-md-3">

				<div class="thumbnail">
					<img src="/uploads/creater_image/kknyein.jpg" alt="">
					<div class="caption">
						<p>Creative, Independence</p>
						<p>Works At - Zaw-Gyi-Mart</p>
						<p class="text-center team-social">
							<a class="socialico-facebook" href="https://www.facebook.com/profile.php?id=100007962852196" title="Facebook" data-toggle="tooltip">#</a>							
							<a class="socialico-google" href="https://github.com/KKhaingNyein" title="Github" data-toggle="tooltip">#</a>
						</p>
					</div>
				</div>
				<h3>K Khaing Nyein</h3>
				<p>Senior Developer</p>

			</div>

			<div class="col-sm-6 col-md-3">

				<div class="thumbnail">
					<img src="/uploads/creater_image/thazin.jpg" alt="">
					<div class="caption">
						<p>Creative, Independence</p>
						<p>Works At - Zaw-Gyi-Mart</p>
						<p class="text-center team-social">
							<a class="socialico-facebook" href="https://www.facebook.com/thazin.htun.7923" title="Facebook" data-toggle="tooltip">#</a>							
							<a class="socialico-google" href="https://github.com/ThazinHtun" title="Github" data-toggle="tooltip">#</a>
						</p>
					</div>
				</div>
				<h3>Thazin Htun</h3>
				<p>Senior Developer</p>

			</div>


		</div>

	</div>
</section>
@include('ecomm.partials.shop1.footer')
@include('ecomm.partials.shop1.copyright')
@endsection