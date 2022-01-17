<?php 
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/174/174879.png" />
	<meta name="apple-mobile-web-app-title" content="Check Number" />

	<link rel="shortcut icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/174/174879.png" />

	<link rel="mask-icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/174/174879.png" color="#111" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>WhatsApp - Check Number</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<style>
		@import url("https://fonts.googleapis.com/css?family=Raleway:400,700,900");

		/* Base styling */

		body {
			width: 100%;
			margin: 0 auto;
			background-color: white;
			font-family: "Raleway", sans-serif;
		}

		.search__container {
			padding-top: 64px;
		}

		.search__title {
			font-size: 32px;
			font-weight: 900;
			text-align: center;
			color: #32CD32;
		}

		.search__input {
			margin-left: 10px;
			width:  30%;
			padding: 12px 24px;
			background-color: transparent;
			transition: transform 250ms ease-in-out;
			font-size: 14px;
			line-height: 18px;

			color: #575756;
			background-color: transparent;

			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath d='M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3C/svg%3E");
			background-repeat: no-repeat;
			background-size: 18px 18px;
			background-position: 95% center;
			border-radius: 50px;
			border: 1px solid #575756;
			transition: all 250ms ease-in-out;
			backface-visibility: hidden;
			transform-style: preserve-3d;
			display:inline-block;
		}
		.country_input {
			padding: 12px 10px;
			background-color: transparent;
			transition: transform 250ms ease-in-out;
			font-size: 14px;
			line-height: 18px;
			width: 7.7%;
			color: #575756;
			background-color: transparent;
			background-repeat: no-repeat;
			background-size: 18px 18px;
			background-position: 95% center;
			border-radius: 50px;
			border: 1px solid #575756;
			transition: all 250ms ease-in-out;
			backface-visibility: hidden;
			transform-style: preserve-3d;
			display:inline-block;
		}

		.search__input::placeholder {
			color: rgba(87, 87, 86, 0.8);
			text-transform: uppercase;
			letter-spacing: 1.5px;
		}

		.search__input:hover,
		.search__input:focus {
			padding: 12px 0;
			outline: 0;
			border: 1px solid transparent;
			border-bottom: 1px solid #575756;
			border-radius: 0;
			background-position: 100% center;
		}
		.country_input::placeholder {
			color: rgba(87, 87, 86, 0.8);
			text-transform: uppercase;
			letter-spacing: 1.5px;
		}

		.country_input:hover,
		.country_input:focus {
			padding: 12px 0;
			outline: 0;
			border: 1px solid transparent;
			border-bottom: 1px solid #575756;
			border-radius: 0;
			background-position: 100% center;
		}

		.credits__container {
			margin-top: 24px;
		}

		.credits__text {
			text-align: center;
			font-size: 13px;
			line-height: 18px;
		}

		.credits__link {
			color: #32CD32;
			text-decoration: none;
			transition: color 250ms ease-in;
		}

		.credits__link:hover,
		.credits__link:focus {
			color: rgb(191, 137, 135);
		}
		/* For Button */
		#check {
			position: relative;
			background-color: #00B000;
			border: none;
			font-size: 16px;
			color: #FFFFFF;
			padding: 16px;
			width: 110px;
			text-align: center;
			-webkit-transition-duration: 0.8s; /* Safari */
			transition-duration: 0.8s;
			text-decoration: none;
			overflow: hidden;
			cursor: pointer;
			border-radius: 12px;
			margin:auto;
			display:block;
		}

		#check:after {
			content: "";
			background: #90EE90;
			display: block;
			position: absolute;
			padding-top: 300%;
			padding-left: 350%;
			margin-left: -20px!important;
			margin-top: -120%;
			opacity: 0;
			transition: all 0.8s
		}

		#check:active:after {
			padding: 0;
			margin: 0;
			opacity: 1;
			transition: 0s
		}
		@media only screen and (max-width: 900px) {
			.search__input {
				width: 60%;
			}
			.country_input {
				width: 20%;
			}
		}
		@media only screen and (max-width: 450px) {
			.search__input {
				width: 60%;
			}
			.country_input {
				width: 20%;
			}
		}

		/* For Results */
		table {
			border-collapse: collapse;
			border-spacing: 0;
			width: 60%;
			border: 1px solid #ddd;
		}

		th, td {
			text-align: center;
			padding: 16px;
		}

		th:first-child, td:first-child {
			text-align: left;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2
		}

		.fa-check {
			color: green;
		}

		.fa-remove {
			color: red;
		}
		.results {
			margin-left: auto;
			margin-right: auto;
		}
		.text-xs-center {
			text-align: center;
		}

		.g-recaptcha {
			display: inline-block;
		}
	</style>

	<script>
		window.console = window.console || function (t) {};
	</script>

	<script>
		if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
		}
	</script>
</head>

<body translate="no">

	<div class="search__container">

		<p class="search__title">
			Go ahead, Check WhatsApp numbers
		</p>
		<form>
			<div style="padding-top: 20px; display: flex; justify-content: center;">
				<!-- country codes (ISO 3166) and Dial codes. -->
				<select class="country_input" id="country__input" name="countryCode" id="">
					<option data-countryCode="IN" value="91" Selected>India (+91)</option>
					<option data-countryCode="GB" value="44">UK (+44)</option>
					<option data-countryCode="US" value="1">USA (+1)</option>
					<optgroup label="Other countries">
						<option data-countryCode="DZ" value="213">Algeria (+213)</option>
						<option data-countryCode="AD" value="376">Andorra (+376)</option>
						<option data-countryCode="AO" value="244">Angola (+244)</option>
						<option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
						<option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
						<option data-countryCode="AR" value="54">Argentina (+54)</option>
						<option data-countryCode="AM" value="374">Armenia (+374)</option>
						<option data-countryCode="AW" value="297">Aruba (+297)</option>
						<option data-countryCode="AU" value="61">Australia (+61)</option>
						<option data-countryCode="AT" value="43">Austria (+43)</option>
						<option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
						<option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
						<option data-countryCode="BH" value="973">Bahrain (+973)</option>
						<option data-countryCode="BD" value="880">Bangladesh (+880)</option>
						<option data-countryCode="BB" value="1246">Barbados (+1246)</option>
						<option data-countryCode="BY" value="375">Belarus (+375)</option>
						<option data-countryCode="BE" value="32">Belgium (+32)</option>
						<option data-countryCode="BZ" value="501">Belize (+501)</option>
						<option data-countryCode="BJ" value="229">Benin (+229)</option>
						<option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
						<option data-countryCode="BT" value="975">Bhutan (+975)</option>
						<option data-countryCode="BO" value="591">Bolivia (+591)</option>
						<option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
						<option data-countryCode="BW" value="267">Botswana (+267)</option>
						<option data-countryCode="BR" value="55">Brazil (+55)</option>
						<option data-countryCode="BN" value="673">Brunei (+673)</option>
						<option data-countryCode="BG" value="359">Bulgaria (+359)</option>
						<option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
						<option data-countryCode="BI" value="257">Burundi (+257)</option>
						<option data-countryCode="KH" value="855">Cambodia (+855)</option>
						<option data-countryCode="CM" value="237">Cameroon (+237)</option>
						<option data-countryCode="CA" value="1">Canada (+1)</option>
						<option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
						<option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
						<option data-countryCode="CF" value="236">Central African Republic (+236)</option>
						<option data-countryCode="CL" value="56">Chile (+56)</option>
						<option data-countryCode="CN" value="86">China (+86)</option>
						<option data-countryCode="CO" value="57">Colombia (+57)</option>
						<option data-countryCode="KM" value="269">Comoros (+269)</option>
						<option data-countryCode="CG" value="242">Congo (+242)</option>
						<option data-countryCode="CK" value="682">Cook Islands (+682)</option>
						<option data-countryCode="CR" value="506">Costa Rica (+506)</option>
						<option data-countryCode="HR" value="385">Croatia (+385)</option>
						<option data-countryCode="CU" value="53">Cuba (+53)</option>
						<option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
						<option data-countryCode="CY" value="357">Cyprus South (+357)</option>
						<option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
						<option data-countryCode="DK" value="45">Denmark (+45)</option>
						<option data-countryCode="DJ" value="253">Djibouti (+253)</option>
						<option data-countryCode="DM" value="1809">Dominica (+1809)</option>
						<option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
						<option data-countryCode="EC" value="593">Ecuador (+593)</option>
						<option data-countryCode="EG" value="20">Egypt (+20)</option>
						<option data-countryCode="SV" value="503">El Salvador (+503)</option>
						<option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
						<option data-countryCode="ER" value="291">Eritrea (+291)</option>
						<option data-countryCode="EE" value="372">Estonia (+372)</option>
						<option data-countryCode="ET" value="251">Ethiopia (+251)</option>
						<option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
						<option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
						<option data-countryCode="FJ" value="679">Fiji (+679)</option>
						<option data-countryCode="FI" value="358">Finland (+358)</option>
						<option data-countryCode="FR" value="33">France (+33)</option>
						<option data-countryCode="GF" value="594">French Guiana (+594)</option>
						<option data-countryCode="PF" value="689">French Polynesia (+689)</option>
						<option data-countryCode="GA" value="241">Gabon (+241)</option>
						<option data-countryCode="GM" value="220">Gambia (+220)</option>
						<option data-countryCode="GE" value="7880">Georgia (+7880)</option>
						<option data-countryCode="DE" value="49">Germany (+49)</option>
						<option data-countryCode="GH" value="233">Ghana (+233)</option>
						<option data-countryCode="GI" value="350">Gibraltar (+350)</option>
						<option data-countryCode="GR" value="30">Greece (+30)</option>
						<option data-countryCode="GL" value="299">Greenland (+299)</option>
						<option data-countryCode="GD" value="1473">Grenada (+1473)</option>
						<option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
						<option data-countryCode="GU" value="671">Guam (+671)</option>
						<option data-countryCode="GT" value="502">Guatemala (+502)</option>
						<option data-countryCode="GN" value="224">Guinea (+224)</option>
						<option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
						<option data-countryCode="GY" value="592">Guyana (+592)</option>
						<option data-countryCode="HT" value="509">Haiti (+509)</option>
						<option data-countryCode="HN" value="504">Honduras (+504)</option>
						<option data-countryCode="HK" value="852">Hong Kong (+852)</option>
						<option data-countryCode="HU" value="36">Hungary (+36)</option>
						<option data-countryCode="IS" value="354">Iceland (+354)</option>
						<option data-countryCode="IN" value="91">India (+91)</option>
						<option data-countryCode="ID" value="62">Indonesia (+62)</option>
						<option data-countryCode="IR" value="98">Iran (+98)</option>
						<option data-countryCode="IQ" value="964">Iraq (+964)</option>
						<option data-countryCode="IE" value="353">Ireland (+353)</option>
						<option data-countryCode="IL" value="972">Israel (+972)</option>
						<option data-countryCode="IT" value="39">Italy (+39)</option>
						<option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
						<option data-countryCode="JP" value="81">Japan (+81)</option>
						<option data-countryCode="JO" value="962">Jordan (+962)</option>
						<option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
						<option data-countryCode="KE" value="254">Kenya (+254)</option>
						<option data-countryCode="KI" value="686">Kiribati (+686)</option>
						<option data-countryCode="KP" value="850">Korea North (+850)</option>
						<option data-countryCode="KR" value="82">Korea South (+82)</option>
						<option data-countryCode="KW" value="965">Kuwait (+965)</option>
						<option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
						<option data-countryCode="LA" value="856">Laos (+856)</option>
						<option data-countryCode="LV" value="371">Latvia (+371)</option>
						<option data-countryCode="LB" value="961">Lebanon (+961)</option>
						<option data-countryCode="LS" value="266">Lesotho (+266)</option>
						<option data-countryCode="LR" value="231">Liberia (+231)</option>
						<option data-countryCode="LY" value="218">Libya (+218)</option>
						<option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
						<option data-countryCode="LT" value="370">Lithuania (+370)</option>
						<option data-countryCode="LU" value="352">Luxembourg (+352)</option>
						<option data-countryCode="MO" value="853">Macao (+853)</option>
						<option data-countryCode="MK" value="389">Macedonia (+389)</option>
						<option data-countryCode="MG" value="261">Madagascar (+261)</option>
						<option data-countryCode="MW" value="265">Malawi (+265)</option>
						<option data-countryCode="MY" value="60">Malaysia (+60)</option>
						<option data-countryCode="MV" value="960">Maldives (+960)</option>
						<option data-countryCode="ML" value="223">Mali (+223)</option>
						<option data-countryCode="MT" value="356">Malta (+356)</option>
						<option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
						<option data-countryCode="MQ" value="596">Martinique (+596)</option>
						<option data-countryCode="MR" value="222">Mauritania (+222)</option>
						<option data-countryCode="YT" value="269">Mayotte (+269)</option>
						<option data-countryCode="MX" value="52">Mexico (+52)</option>
						<option data-countryCode="FM" value="691">Micronesia (+691)</option>
						<option data-countryCode="MD" value="373">Moldova (+373)</option>
						<option data-countryCode="MC" value="377">Monaco (+377)</option>
						<option data-countryCode="MN" value="976">Mongolia (+976)</option>
						<option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
						<option data-countryCode="MA" value="212">Morocco (+212)</option>
						<option data-countryCode="MZ" value="258">Mozambique (+258)</option>
						<option data-countryCode="MN" value="95">Myanmar (+95)</option>
						<option data-countryCode="NA" value="264">Namibia (+264)</option>
						<option data-countryCode="NR" value="674">Nauru (+674)</option>
						<option data-countryCode="NP" value="977">Nepal (+977)</option>
						<option data-countryCode="NL" value="31">Netherlands (+31)</option>
						<option data-countryCode="NC" value="687">New Caledonia (+687)</option>
						<option data-countryCode="NZ" value="64">New Zealand (+64)</option>
						<option data-countryCode="NI" value="505">Nicaragua (+505)</option>
						<option data-countryCode="NE" value="227">Niger (+227)</option>
						<option data-countryCode="NG" value="234">Nigeria (+234)</option>
						<option data-countryCode="NU" value="683">Niue (+683)</option>
						<option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
						<option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
						<option data-countryCode="NO" value="47">Norway (+47)</option>
						<option data-countryCode="OM" value="968">Oman (+968)</option>
						<option data-countryCode="PW" value="680">Palau (+680)</option>
						<option data-countryCode="PA" value="507">Panama (+507)</option>
						<option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
						<option data-countryCode="PY" value="595">Paraguay (+595)</option>
						<option data-countryCode="PE" value="51">Peru (+51)</option>
						<option data-countryCode="PH" value="63">Philippines (+63)</option>
						<option data-countryCode="PL" value="48">Poland (+48)</option>
						<option data-countryCode="PT" value="351">Portugal (+351)</option>
						<option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
						<option data-countryCode="QA" value="974">Qatar (+974)</option>
						<option data-countryCode="RE" value="262">Reunion (+262)</option>
						<option data-countryCode="RO" value="40">Romania (+40)</option>
						<option data-countryCode="RU" value="7">Russia (+7)</option>
						<option data-countryCode="RW" value="250">Rwanda (+250)</option>
						<option data-countryCode="SM" value="378">San Marino (+378)</option>
						<option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
						<option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
						<option data-countryCode="SN" value="221">Senegal (+221)</option>
						<option data-countryCode="CS" value="381">Serbia (+381)</option>
						<option data-countryCode="SC" value="248">Seychelles (+248)</option>
						<option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
						<option data-countryCode="SG" value="65">Singapore (+65)</option>
						<option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
						<option data-countryCode="SI" value="386">Slovenia (+386)</option>
						<option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
						<option data-countryCode="SO" value="252">Somalia (+252)</option>
						<option data-countryCode="ZA" value="27">South Africa (+27)</option>
						<option data-countryCode="ES" value="34">Spain (+34)</option>
						<option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
						<option data-countryCode="SH" value="290">St. Helena (+290)</option>
						<option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
						<option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
						<option data-countryCode="SD" value="249">Sudan (+249)</option>
						<option data-countryCode="SR" value="597">Suriname (+597)</option>
						<option data-countryCode="SZ" value="268">Swaziland (+268)</option>
						<option data-countryCode="SE" value="46">Sweden (+46)</option>
						<option data-countryCode="CH" value="41">Switzerland (+41)</option>
						<option data-countryCode="SI" value="963">Syria (+963)</option>
						<option data-countryCode="TW" value="886">Taiwan (+886)</option>
						<option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
						<option data-countryCode="TH" value="66">Thailand (+66)</option>
						<option data-countryCode="TG" value="228">Togo (+228)</option>
						<option data-countryCode="TO" value="676">Tonga (+676)</option>
						<option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
						<option data-countryCode="TN" value="216">Tunisia (+216)</option>
						<option data-countryCode="TR" value="90">Turkey (+90)</option>
						<option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
						<option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
						<option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
						<option data-countryCode="TV" value="688">Tuvalu (+688)</option>
						<option data-countryCode="UG" value="256">Uganda (+256)</option>
						<!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
						<option data-countryCode="UA" value="380">Ukraine (+380)</option>
						<option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
						<option data-countryCode="UY" value="598">Uruguay (+598)</option>
						<!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
						<option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
						<option data-countryCode="VU" value="678">Vanuatu (+678)</option>
						<option data-countryCode="VA" value="379">Vatican City (+379)</option>
						<option data-countryCode="VE" value="58">Venezuela (+58)</option>
						<option data-countryCode="VN" value="84">Vietnam (+84)</option>
						<option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
						<option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
						<option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
						<option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
						<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
						<option data-countryCode="ZM" value="260">Zambia (+260)</option>
						<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
					</optgroup>
				</select>
				
				<input class="search__input" id="search__input" type="text" placeholder="9999999999" />
			</div>
			<br>
			<div class="text-xs-center">
				<div class="g-recaptcha" id="rcaptcha" data-sitekey="6LcWpxseAAAAAID1Yxka1-cM6Lv8VbTOM0igd2Tx"></div>
			</div>
			<div style="padding-top: 20px;">
				<button type="submit" id="check" value="Submit">Check</button>
			</div>
		</form>
	</div>

	<div class="credits__container">
		<p class="credits__text">Check Number Provided by <a href="https://notbot.in" class="credits__link">NotBot</a></p>
	</div>
	<script>
		$(document).ready(function(){
			$('#final').hide();
			$("form").submit(function(e){
				e.preventDefault();
				if(grecaptcha.getResponse() == "") {
					e.preventDefault();
					alert("Plese check the Captcha.");
				} else {
					var numbers = document.getElementById("search__input").value;
					var country = document.getElementById("country__input").value;
					document.cookie = "numbers="+numbers;
					document.cookie = "country="+country;
					let cookies = document.cookie;
					$("#final").load(location.href + " #final");
					$('#final').show();

					<?php

					$curl = curl_init();
					$numbers = $_COOKIE["numbers"];
					$country = $_COOKIE["country"];
					curl_setopt_array($curl, array(
						CURLOPT_URL => 'https://api.notbot.in/v1/check_number',
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => '',
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => 'POST',
						CURLOPT_POSTFIELDS =>'{
							"contacts": [
							"+'.$country.' '.$numbers.'"
							]
						}',
						CURLOPT_HTTPHEADER => array(
							'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJmcmVzaCI6ZmFsc2UsImlhdCI6MTY0MTEyMzY1MCwianRpIjoiZDM2NjNjY2YtZjc3Ny00NTA5LWIzNTItY2Y2M2NhMzRjYzJiIiwidHlwZSI6ImFjY2VzcyIsInN1YiI6ImZvb0Bmb28uZm9vIiwibmJmIjoxNjQxMTIzNjUwfQ.GtOPPet_OOu_ojSavJ0cK9X_h-rfYgSYYfnQfcMQ61c',
							'Content-Type: application/json'
						),
					));


					$response = curl_exec($curl);
					curl_close($curl);
					$data = json_decode($response, true);

					?>
				}
			});
		});
	</script>

	<div id="final">
		<table class="results">
			<tr>
				<th style="width:22%">Numbers</th>
				<th>Exists on WhatsApp</th>
				<th>Message on WhatsApp</th>
				<th>Copy Number</th>
			</tr>

			<?php  

			foreach ($data as $value) {
				echo '<tr>
				<td>'.$value["input"].'</td>';
				if ($value["status"]=="valid") {
					echo '<td><i class="fa fa-check"></i></td>
					<td><a href="https://api.whatsapp.com/send/?phone='.$value["wa_id"].'&text=Hey!!+Check+out+this+awesome+website+for+automation+https://notbot.in&app_absent=0"><i class="fa fa-whatsapp" style="font-size:24px;color:green;"></i></a></td>
					<td>'.$value["wa_id"].'<i class="fa fa-copy" style="font-size:20px;color:green; padding-left: 9px;"></i></td>
					</tr>';
				} else {
					echo '<td><i class="fa fa-remove"></i></td>
					<td><i class="fa fa-remove"></i></td>
					<td><i class="fa fa-remove"></i></td>
					</tr>';
				}
			}

			?>  

		</table>
	</div>
</body>
</html>
