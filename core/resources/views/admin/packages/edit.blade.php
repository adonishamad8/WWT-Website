@extends('layouts.cmslayout')
	@section('content')
	@if(session()->has('message'))
		<div class="alert alert-success">
			{{session()->get('message')}}
		</div>
	@endif
	@if($errors->all())
		<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>			
			@endforeach
			</ul>
		</div>
	@endif
    <form id="form" class="form-horizontal" action="{{route('packages.update', $package->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		@method('put')
		@csrf
		<div class="row">
			<div class="col-xl-8">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Edit Content</h4>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label class="col-2 col-form-label">Categories</label>
						<div class="col-8">
							<select class="form-control selectpicker" name="categories[]" multiple data-live-search="true" required>
							@foreach($categories as $category)
								<option value="{{$category->id}}" @if(!empty($package) && in_array($category->id, $package->categories->pluck('id')->toArray())) selected @endif>{{$category->name}}</option>
							@endforeach
							</select>
						</div>
					</div>
					<div class="row translate-bg">
						<div class="col-sm-12">
							<div class="tab-content">
								<div class="form-group row">
									<div class="col-md-1"></div>
									 <label for="titleEn" class="col-sm-2 col-form-label">Title</label>
									 <div class="col-sm-8">
										<input type="text" name="name" value="{{$package->name}}" class="form-control" id="titleEn" placeholder="Title">
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image (1200x800px)</label>
						<div class="col-md-9">
							@if($package->getFirstMediaUrl('package'))
							<div class="col-md-3 gallery-pages">
								<div class="thumbnail">
									<div class="caption" style="display: none;">
										<h4>Image</h4>
										<p>
										   <a href="{{$package->getFirstMediaUrl('package', 'thumb-large')}}" data-lightbox="example-set" class="example-image-link badge badge-success">View</a>
										   <button id="remove-image" class="badge badge-danger">Remove</button>
										</p>
									</div>
									<img class="article-image" src="{{$package->getFirstMediaUrl('package', 'thumb')}}" width="100">
								</div>
							</div>
							@endif
							<input type="file" name="image" class="form-control input-medium">
						</div>
					</div>
					<div class="row translate-bg">
						<div class="col-sm-12">
							<div class="tab-content">
								<div class="form-group row">
									<div class="col-md-1"></div>
									 <label for="DescEn" class="col-sm-2 col-form-label">Description</label>
									 <div class="col-sm-8">
										<textarea id="editor-en" name="description">{{$package->description}}</textarea>
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="country" class="col-sm-2 col-form-label">Country</label>
						<div class="col-sm-8">
							<select id="country" name="country" class="form-control selectpicker" data-live-search="true" required>
								<option value="Afghanistan" {{ old("country", $package->country) == "Afghanistan" ? "selected" : "" }}>Afghanistan</option>
								<option value="Åland Islands" {{ old("country", $package->country) == "Åland Islands" ? "selected" : "" }}>Åland Islands</option>
								<option value="Albania" {{ old("country", $package->country) == "Albania" ? "selected" : "" }}>Albania</option>
								<option value="Algeria" {{ old("country", $package->country) == "Algeria" ? "selected" : "" }}>Algeria</option>
								<option value="American Samoa" {{ old("country", $package->country) == "American Samoa" ? "selected" : "" }}>American Samoa</option>
								<option value="Andorra" {{ old("country", $package->country) == "Andorra" ? "selected" : "" }}>Andorra</option>
								<option value="Angola" {{ old("country", $package->country) == "Angola" ? "selected" : "" }}>Angola</option>
								<option value="Anguilla" {{ old("country", $package->country) == "Anguilla" ? "selected" : "" }}>Anguilla</option>
								<option value="Antarctica" {{ old("country", $package->country) == "Antarctica" ? "selected" : "" }}>Antarctica</option>
								<option value="Antigua and Barbuda" {{ old("country", $package->country) == "Antigua and Barbuda" ? "selected" : "" }}>Antigua and Barbuda</option>
								<option value="Argentina" {{ old("country", $package->country) == "Argentina" ? "selected" : "" }}>Argentina</option>
								<option value="Armenia" {{ old("country", $package->country) == "Armenia" ? "selected" : "" }}>Armenia</option>
								<option value="Aruba" {{ old("country", $package->country) == "Aruba" ? "selected" : "" }}>Aruba</option>
								<option value="Australia" {{ old("country", $package->country) == "Australia" ? "selected" : "" }}>Australia</option>
								<option value="Austria" {{ old("country", $package->country) == "Austria" ? "selected" : "" }}>Austria</option>
								<option value="Azerbaijan" {{ old("country", $package->country) == "Azerbaijan" ? "selected" : "" }}>Azerbaijan</option>
								<option value="Bahamas" {{ old("country", $package->country) == "Bahamas" ? "selected" : "" }}>Bahamas</option>
								<option value="Bahrain" {{ old("country", $package->country) == "Bahrain" ? "selected" : "" }}>Bahrain</option>
								<option value="Bangladesh" {{ old("country", $package->country) == "Bangladesh" ? "selected" : "" }}>Bangladesh</option>
								<option value="Barbados" {{ old("country", $package->country) == "Barbados" ? "selected" : "" }}>Barbados</option>
								<option value="Belarus" {{ old("country", $package->country) == "Belarus" ? "selected" : "" }}>Belarus</option>
								<option value="Belgium" {{ old("country", $package->country) == "Belgium" ? "selected" : "" }}>Belgium</option>
								<option value="Belize" {{ old("country", $package->country) == "Belize" ? "selected" : "" }}>Belize</option>
								<option value="Benin" {{ old("country", $package->country) == "Benin" ? "selected" : "" }}>Benin</option>
								<option value="Bermuda" {{ old("country", $package->country) == "Bermuda" ? "selected" : "" }}>Bermuda</option>
								<option value="Bhutan" {{ old("country", $package->country) == "Bhutan" ? "selected" : "" }}>Bhutan</option>
								<option value="Bolivia" {{ old("country", $package->country) == "Bolivia" ? "selected" : "" }}>Bolivia</option>
								<option value="Bosnia and Herzegovina" {{ old("country", $package->country) == "Bosnia and Herzegovina" ? "selected" : "" }}>Bosnia and Herzegovina</option>
								<option value="Botswana" {{ old("country", $package->country) == "Botswana" ? "selected" : "" }}>Botswana</option>
								<option value="Bouvet Island" {{ old("country", $package->country) == "Bouvet Island" ? "selected" : "" }}>Bouvet Island</option>
								<option value="Brazil" {{ old("country", $package->country) == "Brazil" ? "selected" : "" }}>Brazil</option>
								<option value="British Indian Ocean Territory" {{ old("country", $package->country) == "British Indian Ocean Territory" ? "selected" : "" }}>British Indian Ocean Territory</option>
								<option value="Brunei Darussalam" {{ old("country", $package->country) == "Brunei Darussalam" ? "selected" : "" }}>Brunei Darussalam</option>
								<option value="Bulgaria" {{ old("country", $package->country) == "Bulgaria" ? "selected" : "" }}>Bulgaria</option>
								<option value="Burkina Faso" {{ old("country", $package->country) == "Burkina Faso" ? "selected" : "" }}>Burkina Faso</option>
								<option value="Burundi" {{ old("country", $package->country) == "Burundi" ? "selected" : "" }}>Burundi</option>
								<option value="Cambodia" {{ old("country", $package->country) == "Cambodia" ? "selected" : "" }}>Cambodia</option>
								<option value="Cameroon" {{ old("country", $package->country) == "Cameroon" ? "selected" : "" }}>Cameroon</option>
								<option value="Canada" {{ old("country", $package->country) == "Canada" ? "selected" : "" }}>Canada</option>
								<option value="Cape Verde" {{ old("country", $package->country) == "Cape Verde" ? "selected" : "" }}>Cape Verde</option>
								<option value="Cayman Islands" {{ old("country", $package->country) == "Cayman Islands" ? "selected" : "" }}>Cayman Islands</option>
								<option value="Central African Republic" {{ old("country", $package->country) == "Central African Republic" ? "selected" : "" }}>Central African Republic</option>
								<option value="Chad" {{ old("country", $package->country) == "Chad" ? "selected" : "" }}>Chad</option>
								<option value="Chile" {{ old("country", $package->country) == "Chile" ? "selected" : "" }}>Chile</option>
								<option value="China" {{ old("country", $package->country) == "China" ? "selected" : "" }}>China</option>
								<option value="Christmas Island" {{ old("country", $package->country) == "Christmas Island" ? "selected" : "" }}>Christmas Island</option>
								<option value="Cocos (Keeling) Islands" {{ old("country", $package->country) == "Cocos (Keeling) Islands" ? "selected" : "" }}>Cocos (Keeling) Islands</option>
								<option value="Colombia" {{ old("country", $package->country) == "Colombia" ? "selected" : "" }}>Colombia</option>
								<option value="Comoros" {{ old("country", $package->country) == "Comoros" ? "selected" : "" }}>Comoros</option>
								<option value="Congo" {{ old("country", $package->country) == "Congo" ? "selected" : "" }}>Congo</option>
								<option value="Congo, The Democratic Republic of The" {{ old("country", $package->country) == "Congo, The Democratic Republic" ? "selected" : "" }}>Congo, The Democratic Republic</option>
								<option value="Cook Islands" {{ old("country", $package->country) == "Cook Islands" ? "selected" : "" }}>Cook Islands</option>
								<option value="Costa Rica" {{ old("country", $package->country) == "Costa Rica" ? "selected" : "" }}>Costa Rica</option>
								<option value="Cote D'ivoire" {{ old("country", $package->country) == "Cote D'ivoire" ? "selected" : "" }}>Cote D'ivoire</option>
								<option value="Croatia" {{ old("country", $package->country) == "Croatia" ? "selected" : "" }}>Croatia</option>
								<option value="Cuba" {{ old("country", $package->country) == "Cuba" ? "selected" : "" }}>Cuba</option>
								<option value="Cyprus" {{ old("country", $package->country) == "Cyprus" ? "selected" : "" }}>Cyprus</option>
								<option value="Czech Republic" {{ old("country", $package->country) == "Czech Republic" ? "selected" : "" }}>Czech Republic</option>
								<option value="Denmark" {{ old("country", $package->country) == "Denmark" ? "selected" : "" }}>Denmark</option>
								<option value="Djibouti" {{ old("country", $package->country) == "Djibouti" ? "selected" : "" }}>Djibouti</option>
								<option value="Dominica" {{ old("country", $package->country) == "Dominica" ? "selected" : "" }}>Dominica</option>
								<option value="Dominican Republic" {{ old("country", $package->country) == "Dominican Republic" ? "selected" : "" }}>Dominican Republic</option>
								<option value="Ecuador" {{ old("country", $package->country) == "Ecuador" ? "selected" : "" }}>Ecuador</option>
								<option value="Egypt" {{ old("country", $package->country) == "Egypt" ? "selected" : "" }}>Egypt</option>
								<option value="El Salvador" {{ old("country", $package->country) == "El Salvador" ? "selected" : "" }}>El Salvador</option>
								<option value="Equatorial Guinea" {{ old("country", $package->country) == "Equatorial Guinea" ? "selected" : "" }}>Equatorial Guinea</option>
								<option value="Eritrea" {{ old("country", $package->country) == "Eritrea" ? "selected" : "" }}>Eritrea</option>
								<option value="Estonia" {{ old("country", $package->country) == "Estonia" ? "selected" : "" }}>Estonia</option>
								<option value="Ethiopia" {{ old("country", $package->country) == "Ethiopia" ? "selected" : "" }}>Ethiopia</option>
								<option value="Falkland Islands (Malvinas)" {{ old("country", $package->country) == "Falkland Islands (Malvinas)" ? "selected" : "" }}>Falkland Islands (Malvinas)</option>
								<option value="Faroe Islands" {{ old("country", $package->country) == "Faroe Islands" ? "selected" : "" }}>Faroe Islands</option>
								<option value="Fiji" {{ old("country", $package->country) == "Fiji" ? "selected" : "" }}>Fiji</option>
								<option value="Finland" {{ old("country", $package->country) == "Finland" ? "selected" : "" }}>Finland</option>
								<option value="France" {{ old("country", $package->country) == "France" ? "selected" : "" }}>France</option>
								<option value="French Guiana" {{ old("country", $package->country) == "French Guiana" ? "selected" : "" }}>French Guiana</option>
								<option value="French Polynesia" {{ old("country", $package->country) == "French Polynesia" ? "selected" : "" }}>French Polynesia</option>
								<option value="French Southern Territories" {{ old("country", $package->country) == "French Southern Territories" ? "selected" : "" }}>French Southern Territories</option>
								<option value="Gabon" {{ old("country", $package->country) == "Gabon" ? "selected" : "" }}>Gabon</option>
								<option value="Gambia" {{ old("country", $package->country) == "Gambia" ? "selected" : "" }}>Gambia</option>
								<option value="Georgia" {{ old("country", $package->country) == "Georgia" ? "selected" : "" }}>Georgia</option>
								<option value="Germany" {{ old("country", $package->country) == "Germany" ? "selected" : "" }}>Germany</option>
								<option value="Ghana" {{ old("country", $package->country) == "Ghana" ? "selected" : "" }}>Ghana</option>
								<option value="Gibraltar" {{ old("country", $package->country) == "Gibraltar" ? "selected" : "" }}>Gibraltar</option>
								<option value="Greece" {{ old("country", $package->country) == "Greece" ? "selected" : "" }}>Greece</option>
								<option value="Greenland" {{ old("country", $package->country) == "Greenland" ? "selected" : "" }}>Greenland</option>
								<option value="Grenada" {{ old("country", $package->country) == "Grenada" ? "selected" : "" }}>Grenada</option>
								<option value="Guadeloupe" {{ old("country", $package->country) == "Guadeloupe" ? "selected" : "" }}>Guadeloupe</option>
								<option value="Guam" {{ old("country", $package->country) == "Guam" ? "selected" : "" }}>Guam</option>
								<option value="Guatemala" {{ old("country", $package->country) == "Guatemala" ? "selected" : "" }}>Guatemala</option>
								<option value="Guernsey" {{ old("country", $package->country) == "Guernsey" ? "selected" : "" }}>Guernsey</option>
								<option value="Guinea" {{ old("country", $package->country) == "Guinea" ? "selected" : "" }}>Guinea</option>
								<option value="Guinea-bissau" {{ old("country", $package->country) == "Guinea-bissau" ? "selected" : "" }}>Guinea-bissau</option>
								<option value="Guyana" {{ old("country", $package->country) == "Guyana" ? "selected" : "" }}>Guyana</option>
								<option value="Haiti" {{ old("country", $package->country) == "Haiti" ? "selected" : "" }}>Haiti</option>
								<option value="Heard Island and Mcdonald Islands" {{ old("country", $package->country) == "Heard Island and Mcdonald Islands" ? "selected" : "" }}>Heard Island and Mcdonald Islands</option>
								<option value="Holy See (Vatican City State)" {{ old("country", $package->country) == "Holy See (Vatican City State)" ? "selected" : "" }}>Holy See (Vatican City State)</option>
								<option value="Honduras" {{ old("country", $package->country) == "Honduras" ? "selected" : "" }}>Honduras</option>
								<option value="Hong Kong" {{ old("country", $package->country) == "Hong Kong" ? "selected" : "" }}>Hong Kong</option>
								<option value="Hungary" {{ old("country", $package->country) == "Hungary" ? "selected" : "" }}>Hungary</option>
								<option value="Iceland" {{ old("country", $package->country) == "Iceland" ? "selected" : "" }}>Iceland</option>
								<option value="India" {{ old("country", $package->country) == "India" ? "selected" : "" }}>India</option>
								<option value="Indonesia" {{ old("country", $package->country) == "Indonesia" ? "selected" : "" }}>Indonesia</option>
								<option value="Iran, Islamic Republic of" {{ old("country", $package->country) == "Iran, Islamic Republic of" ? "selected" : "" }}>Iran, Islamic Republic of</option>
								<option value="Iraq" {{ old("country", $package->country) == "Iraq" ? "selected" : "" }}>Iraq</option>
								<option value="Ireland" {{ old("country", $package->country) == "Ireland" ? "selected" : "" }}>Ireland</option>
								<option value="Isle of Man" {{ old("country", $package->country) == "Isle of Man" ? "selected" : "" }}>Isle of Man</option>
								<option value="Israel" {{ old("country", $package->country) == "Israel" ? "selected" : "" }}>Israel</option>
								<option value="Italy" {{ old("country", $package->country) == "Italy" ? "selected" : "" }}>Italy</option>
								<option value="Jamaica" {{ old("country", $package->country) == "Jamaica" ? "selected" : "" }}>Jamaica</option>
								<option value="Japan" {{ old("country", $package->country) == "Japan" ? "selected" : "" }}>Japan</option>
								<option value="Jersey" {{ old("country", $package->country) == "Jersey" ? "selected" : "" }}>Jersey</option>
								<option value="Jordan" {{ old("country", $package->country) == "Jordan" ? "selected" : "" }}>Jordan</option>
								<option value="Kazakhstan" {{ old("country", $package->country) == "Kazakhstan" ? "selected" : "" }}>Kazakhstan</option>
								<option value="Kenya" {{ old("country", $package->country) == "Kenya" ? "selected" : "" }}>Kenya</option>
								<option value="Kiribati" {{ old("country", $package->country) == "Kiribati" ? "selected" : "" }}>Kiribati</option>
								<option value="Korea, Democratic People's Republic of" {{ old("country", $package->country) == "Korea, Democratic People's Republic of" ? "selected" : "" }}>Korea, Democratic People's Republic of</option>
								<option value="Korea, Republic of" {{ old("country", $package->country) == "Korea, Republic of" ? "selected" : "" }}>Korea, Republic of</option>
								<option value="Kuwait" {{ old("country", $package->country) == "Kuwait" ? "selected" : "" }}>Kuwait</option>
								<option value="Kyrgyzstan" {{ old("country", $package->country) == "Kyrgyzstan" ? "selected" : "" }}>Kyrgyzstan</option>
								<option value="Lao People's Democratic Republic" {{ old("country", $package->country) == "Lao People's Democratic Republic" ? "selected" : "" }}>Lao People's Democratic Republic</option>
								<option value="Latvia" {{ old("country", $package->country) == "Latvia" ? "selected" : "" }}>Latvia</option>
								<option value="Lebanon" {{ old("country", $package->country) == "Lebanon" ? "selected" : "" }}>Lebanon</option>
								<option value="Lesotho" {{ old("country", $package->country) == "Lesotho" ? "selected" : "" }}>Lesotho</option>
								<option value="Liberia" {{ old("country", $package->country) == "Liberia" ? "selected" : "" }}>Liberia</option>
								<option value="Libyan Arab Jamahiriya" {{ old("country", $package->country) == "Libyan Arab Jamahiriya" ? "selected" : "" }}>Libyan Arab Jamahiriya</option>
								<option value="Liechtenstein" {{ old("country", $package->country) == "Liechtenstein" ? "selected" : "" }}>Liechtenstein</option>
								<option value="Lithuania" {{ old("country", $package->country) == "Lithuania" ? "selected" : "" }}>Lithuania</option>
								<option value="Luxembourg" {{ old("country", $package->country) == "Luxembourg" ? "selected" : "" }}>Luxembourg</option>
								<option value="Macao" {{ old("country", $package->country) == "Macao" ? "selected" : "" }}>Macao</option>
								<option value="Macedonia, The Former Yugoslav Republic of" {{ old("country", $package->country) == "Macedonia, The Former Yugoslav Republic of" ? "selected" : "" }}>Macedonia, The Former Yugoslav Republic of</option>
								<option value="Madagascar" {{ old("country", $package->country) == "Madagascar" ? "selected" : "" }}>Madagascar</option>
								<option value="Malawi" {{ old("country", $package->country) == "Malawi" ? "selected" : "" }}>Malawi</option>
								<option value="Malaysia" {{ old("country", $package->country) == "Malaysia" ? "selected" : "" }}>Malaysia</option>
								<option value="Maldives" {{ old("country", $package->country) == "Maldives" ? "selected" : "" }}>Maldives</option>
								<option value="Mali" {{ old("country", $package->country) == "Mali" ? "selected" : "" }}>Mali</option>
								<option value="Malta" {{ old("country", $package->country) == "Malta" ? "selected" : "" }}>Malta</option>
								<option value="Marshall Islands" {{ old("country", $package->country) == "Marshall Islands" ? "selected" : "" }}>Marshall Islands</option>
								<option value="Martinique" {{ old("country", $package->country) == "Martinique" ? "selected" : "" }}>Martinique</option>
								<option value="Mauritania" {{ old("country", $package->country) == "Mauritania" ? "selected" : "" }}>Mauritania</option>
								<option value="Mauritius" {{ old("country", $package->country) == "Mauritius" ? "selected" : "" }}>Mauritius</option>
								<option value="Mayotte" {{ old("country", $package->country) == "Mayotte" ? "selected" : "" }}>Mayotte</option>
								<option value="Mexico" {{ old("country", $package->country) == "Mexico" ? "selected" : "" }}>Mexico</option>
								<option value="Micronesia, Federated States of" {{ old("country", $package->country) == "Micronesia, Federated States of" ? "selected" : "" }}>Micronesia, Federated States of</option>
								<option value="Moldova, Republic of" {{ old("country", $package->country) == "Moldova, Republic of" ? "selected" : "" }}>Moldova, Republic of</option>
								<option value="Monaco" {{ old("country", $package->country) == "Monaco" ? "selected" : "" }}>Monaco</option>
								<option value="Mongolia" {{ old("country", $package->country) == "Mongolia" ? "selected" : "" }}>Mongolia</option>
								<option value="Montenegro" {{ old("country", $package->country) == "Montenegro" ? "selected" : "" }}>Montenegro</option>
								<option value="Montserrat" {{ old("country", $package->country) == "Montserrat" ? "selected" : "" }}>Montserrat</option>
								<option value="Morocco" {{ old("country", $package->country) == "Morocco" ? "selected" : "" }}>Morocco</option>
								<option value="Mozambique" {{ old("country", $package->country) == "Mozambique" ? "selected" : "" }}>Mozambique</option>
								<option value="Myanmar" {{ old("country", $package->country) == "Myanmar" ? "selected" : "" }}>Myanmar</option>
								<option value="Namibia" {{ old("country", $package->country) == "Namibia" ? "selected" : "" }}>Namibia</option>
								<option value="Nauru" {{ old("country", $package->country) == "Nauru" ? "selected" : "" }}>Nauru</option>
								<option value="Nepal" {{ old("country", $package->country) == "Nepal" ? "selected" : "" }}>Nepal</option>
								<option value="Netherlands" {{ old("country", $package->country) == "Netherlands" ? "selected" : "" }}>Netherlands</option>
								<option value="Netherlands Antilles" {{ old("country", $package->country) == "Netherlands Antilles" ? "selected" : "" }}>Netherlands Antilles</option>
								<option value="New Caledonia" {{ old("country", $package->country) == "New Caledonia" ? "selected" : "" }}>New Caledonia</option>
								<option value="New Zealand" {{ old("country", $package->country) == "New Zealand" ? "selected" : "" }}>New Zealand</option>
								<option value="Nicaragua" {{ old("country", $package->country) == "Nicaragua" ? "selected" : "" }}>Nicaragua</option>
								<option value="Niger" {{ old("country", $package->country) == "Niger" ? "selected" : "" }}>Niger</option>
								<option value="Nigeria" {{ old("country", $package->country) == "Nigeria" ? "selected" : "" }}>Nigeria</option>
								<option value="Niue" {{ old("country", $package->country) == "Niue" ? "selected" : "" }}>Niue</option>
								<option value="Norfolk Island" {{ old("country", $package->country) == "Norfolk Island" ? "selected" : "" }}>Norfolk Island</option>
								<option value="Northern Mariana Islands" {{ old("country", $package->country) == "Northern Mariana Islands" ? "selected" : "" }}>Northern Mariana Islands</option>
								<option value="Norway" {{ old("country", $package->country) == "Norway" ? "selected" : "" }}>Norway</option>
								<option value="Oman" {{ old("country", $package->country) == "Oman" ? "selected" : "" }}>Oman</option>
								<option value="Pakistan" {{ old("country", $package->country) == "Pakistan" ? "selected" : "" }}>Pakistan</option>
								<option value="Palau" {{ old("country", $package->country) == "Palau" ? "selected" : "" }}>Palau</option>
								<option value="Palestinian Territory, Occupied" {{ old("country", $package->country) == "Palestinian Territory, Occupied" ? "selected" : "" }}>Palestinian Territory, Occupied</option>
								<option value="Panama" {{ old("country", $package->country) == "Panama" ? "selected" : "" }}>Panama</option>
								<option value="Papua New Guinea" {{ old("country", $package->country) == "Papua New Guinea" ? "selected" : "" }}>Papua New Guinea</option>
								<option value="Paraguay" {{ old("country", $package->country) == "Paraguay" ? "selected" : "" }}>Paraguay</option>
								<option value="Peru" {{ old("country", $package->country) == "Peru" ? "selected" : "" }}>Peru</option>
								<option value="Philippines" {{ old("country", $package->country) == "Philippines" ? "selected" : "" }}>Philippines</option>
								<option value="Pitcairn" {{ old("country", $package->country) == "Pitcairn" ? "selected" : "" }}>Pitcairn</option>
								<option value="Poland" {{ old("country", $package->country) == "Poland" ? "selected" : "" }}>Poland</option>
								<option value="Portugal" {{ old("country", $package->country) == "Portugal" ? "selected" : "" }}>Portugal</option>
								<option value="Puerto Rico" {{ old("country", $package->country) == "Puerto Rico" ? "selected" : "" }}>Puerto Rico</option>
								<option value="Qatar" {{ old("country", $package->country) == "Qatar" ? "selected" : "" }}>Qatar</option>
								<option value="Reunion" {{ old("country", $package->country) == "Reunion" ? "selected" : "" }}>Reunion</option>
								<option value="Romania" {{ old("country", $package->country) == "Romania" ? "selected" : "" }}>Romania</option>
								<option value="Russian Federation" {{ old("country", $package->country) == "Russian Federation" ? "selected" : "" }}>Russian Federation</option>
								<option value="Rwanda" {{ old("country", $package->country) == "Rwanda" ? "selected" : "" }}>Rwanda</option>
								<option value="Saint Helena" {{ old("country", $package->country) == "Saint Helena" ? "selected" : "" }}>Saint Helena</option>
								<option value="Saint Kitts and Nevis" {{ old("country", $package->country) == "Saint Kitts and Nevis" ? "selected" : "" }}>Saint Kitts and Nevis</option>
								<option value="Saint Lucia" {{ old("country", $package->country) == "Saint Lucia" ? "selected" : "" }}>Saint Lucia</option>
								<option value="Saint Pierre and Miquelon" {{ old("country", $package->country) == "Saint Pierre and Miquelon" ? "selected" : "" }}>Saint Pierre and Miquelon</option>
								<option value="Saint Vincent and The Grenadines" {{ old("country", $package->country) == "Saint Vincent and The Grenadines" ? "selected" : "" }}>Saint Vincent and The Grenadines</option>
								<option value="Samoa" {{ old("country", $package->country) == "Samoa" ? "selected" : "" }}>Samoa</option>
								<option value="San Marino" {{ old("country", $package->country) == "San Marino" ? "selected" : "" }}>San Marino</option>
								<option value="Sao Tome and Principe" {{ old("country", $package->country) == "Sao Tome and Principe" ? "selected" : "" }}>Sao Tome and Principe</option>
								<option value="Saudi Arabia" {{ old("country", $package->country) == "Saudi Arabia" ? "selected" : "" }}>Saudi Arabia</option>
								<option value="Senegal" {{ old("country", $package->country) == "Senegal" ? "selected" : "" }}>Senegal</option>
								<option value="Serbia" {{ old("country", $package->country) == "Serbia" ? "selected" : "" }}>Serbia</option>
								<option value="Seychelles" {{ old("country", $package->country) == "Seychelles" ? "selected" : "" }}>Seychelles</option>
								<option value="Sierra Leone" {{ old("country", $package->country) == "Sierra Leone" ? "selected" : "" }}>Sierra Leone</option>
								<option value="Singapore" {{ old("country", $package->country) == "Singapore" ? "selected" : "" }}>Singapore</option>
								<option value="Slovakia" {{ old("country", $package->country) == "Slovakia" ? "selected" : "" }}>Slovakia</option>
								<option value="Slovenia" {{ old("country", $package->country) == "Slovenia" ? "selected" : "" }}>Slovenia</option>
								<option value="Solomon Islands" {{ old("country", $package->country) == "Solomon Islands" ? "selected" : "" }}>Solomon Islands</option>
								<option value="Somalia" {{ old("country", $package->country) == "Somalia" ? "selected" : "" }}>Somalia</option>
								<option value="South Africa" {{ old("country", $package->country) == "South Africa" ? "selected" : "" }}>South Africa</option>
								<option value="South Georgia and The South Sandwich Islands" {{ old("country", $package->country) == "South Georgia and The South Sandwich Islands" ? "selected" : "" }}>South Georgia and The South Sandwich Islands</option>
								<option value="Spain" {{ old("country", $package->country) == "Spain" ? "selected" : "" }}>Spain</option>
								<option value="Sri Lanka" {{ old("country", $package->country) == "Sri Lanka" ? "selected" : "" }}>Sri Lanka</option>
								<option value="Sudan" {{ old("country", $package->country) == "Sudan" ? "selected" : "" }}>Sudan</option>
								<option value="Suriname" {{ old("country", $package->country) == "Suriname" ? "selected" : "" }}>Suriname</option>
								<option value="Svalbard and Jan Mayen" {{ old("country", $package->country) == "Svalbard and Jan Mayen" ? "selected" : "" }}>Svalbard and Jan Mayen</option>
								<option value="Swaziland" {{ old("country", $package->country) == "Swaziland" ? "selected" : "" }}>Swaziland</option>
								<option value="Sweden" {{ old("country", $package->country) == "Sweden" ? "selected" : "" }}>Sweden</option>
								<option value="Switzerland" {{ old("country", $package->country) == "Switzerland" ? "selected" : "" }}>Switzerland</option>
								<option value="Syrian Arab Republic" {{ old("country", $package->country) == "Syrian Arab Republic" ? "selected" : "" }}>Syrian Arab Republic</option>
								<option value="Taiwan" {{ old("country", $package->country) == "Taiwan" ? "selected" : "" }}>Taiwan</option>
								<option value="Tajikistan" {{ old("country", $package->country) == "Tajikistan" ? "selected" : "" }}>Tajikistan</option>
								<option value="Tanzania, United Republic of" {{ old("country", $package->country) == "Tanzania, United Republic" ? "selected" : "" }}>Tanzania, United Republic</option>
								<option value="Thailand" {{ old("country", $package->country) == "Thailand" ? "selected" : "" }}>Thailand</option>
								<option value="Timor-leste" {{ old("country", $package->country) == "Timor-leste" ? "selected" : "" }}>Timor-leste</option>
								<option value="Togo" {{ old("country", $package->country) == "Togo" ? "selected" : "" }}>Togo</option>
								<option value="Tokelau" {{ old("country", $package->country) == "Tokelau" ? "selected" : "" }}>Tokelau</option>
								<option value="Tonga" {{ old("country", $package->country) == "Tonga" ? "selected" : "" }}>Tonga</option>
								<option value="Trinidad and Tobago" {{ old("country", $package->country) == "Trinidad and Tobago" ? "selected" : "" }}>Trinidad and Tobago</option>
								<option value="Tunisia" {{ old("country", $package->country) == "Tunisia" ? "selected" : "" }}>Tunisia</option>
								<option value="Turkey" {{ old("country", $package->country) == "Turkey" ? "selected" : "" }}>Turkey</option>
								<option value="Turkmenistan" {{ old("country", $package->country) == "Turkmenistan" ? "selected" : "" }}>Turkmenistan</option>
								<option value="Turks and Caicos Islands" {{ old("country", $package->country) == "Turks and Caicos Islands" ? "selected" : "" }}>Turks and Caicos Islands</option>
								<option value="Tuvalu" {{ old("country", $package->country) == "Tuvalu" ? "selected" : "" }}>Tuvalu</option>
								<option value="Uganda" {{ old("country", $package->country) == "Uganda" ? "selected" : "" }}>Uganda</option>
								<option value="Ukraine" {{ old("country", $package->country) == "Ukraine" ? "selected" : "" }}>Ukraine</option>
								<option value="United Arab Emirates" {{ old("country", $package->country) == "United Arab Emirates" ? "selected" : "" }}>United Arab Emirates</option>
								<option value="United Kingdom" {{ old("country", $package->country) == "United Kingdom" ? "selected" : "" }}>United Kingdom</option>
								<option value="United States" {{ old("country", $package->country) == "United States" ? "selected" : "" }}>United States</option>
								<option value="United States Minor Outlying Islands" {{ old("country", $package->country) == "United States Minor Outlying Islands" ? "selected" : "" }}>United States Minor Outlying Islands</option>
								<option value="Uruguay" {{ old("country", $package->country) == "Uruguay" ? "selected" : "" }}>Uruguay</option>
								<option value="Uzbekistan" {{ old("country", $package->country) == "Uzbekistan" ? "selected" : "" }}>Uzbekistan</option>
								<option value="Vanuatu" {{ old("country", $package->country) == "Vanuatu" ? "selected" : "" }}>Vanuatu</option>
								<option value="Venezuela" {{ old("country", $package->country) == "Venezuela" ? "selected" : "" }}>Venezuela</option>
								<option value="Viet Nam" {{ old("country", $package->country) == "Viet Nam" ? "selected" : "" }}>Viet Nam</option>
								<option value="Virgin Islands, British" {{ old("country", $package->country) == "Virgin Islands, British" ? "selected" : "" }}>Virgin Islands, British</option>
								<option value="Virgin Islands, U.S." {{ old("country", $package->country) == "Virgin Islands, U.S." ? "selected" : "" }}>Virgin Islands, U.S.</option>
								<option value="Wallis and Futuna" {{ old("country", $package->country) == "Wallis and Futuna" ? "selected" : "" }}>Wallis and Futuna</option>
								<option value="Western Sahara" {{ old("country", $package->country) == "Western Sahara" ? "selected" : "" }}>Western Sahara</option>
								<option value="Yemen" {{ old("country", $package->country) == "Yemen" ? "selected" : "" }}>Yemen</option>
								<option value="Zambia" {{ old("country", $package->country) == "Zambia" ? "selected" : "" }}>Zambia</option>
								<option value="Zimbabwe" {{ old("country", $package->country) == "Zimbabwe" ? "selected" : "" }}>Zimbabwe</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="date" class="col-sm-2 col-form-label">Date</label>
						<div class="col-sm-8">
							<input type="text" name="date" class="form-control" value="{{$package->date}}" id="date" placeholder="Date">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="price" class="col-sm-2 col-form-label">Price</label>
						<div class="col-sm-8">
							<input type="text" name="price" class="form-control" value="{{$package->price}}" id="price" placeholder="Price">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="is_video" class="col-sm-2 col-form-label">Is Video</label>
						<div class="col-sm-1">
							<div class="checkbox checkbox-primary edit-checkbox">
								<input type="checkbox" name="is_video" class="form-control" id="is_video" value="1" {{ ($package->is_video=="1")? "checked" : "" }}>
								<label for="is_video"></label>
							</div>
						</div>
					</div>
					<div class="form-group row {{($package->is_video=="1")? "" : "d-none" }}" id="video_cat_div">
						<div class="col-md-1"></div>
						<label for="icon" class="col-sm-2 col-form-label">Video Link</label>
						<div class="col-sm-8">
							<input type="text" name="video_link" class="form-control" value="{{$package->video_link}}" id="video_link" placeholder="Video Link">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="featured" class="col-sm-2 col-form-label">Featured</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="featured" class="form-control" id="featured" value="1" {{ ($package->featured=="1")? "checked" : "" }}>
								<span class="slider round"></span>
							</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="published" class="col-sm-2 col-form-label">Published</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="published" class="form-control" id="published" value="1" {{ ($package->published=="1")? "checked" : "" }}>
								<span class="slider round"></span>
							</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="tags" class="col-sm-2 col-form-label">SEO Keywords</label>
						<div class="col-sm-8">
							<input type="text" name="tag_list" value="{{$package->tag_list}}" data-role="tagsinput" placeholder="add keywords"/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
				        <label for="gallery" class="col-sm-2 col-form-label">Photo Gallery (1200x1200px)</label>
						<div class="col-sm-8">
							<div class="needsclick dropzone" id="gallery-dropzone"></div>
						</div>
				    </div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">PDF Brochure</label>
						<div class="col-md-9">
							@if(file_exists(public_path('uploads/'. $package->pdf_name. '.pdf')))
							<div class="caption">
								<h4>Current PDF</h4>
								<p>
									<a href="{{route('downloadPdf', $package->pdf_name)}}" class="badge badge-inverse cv-down">Download PDF</a>
									<button id="remove-image" onclick="return confirm_delete()" name="delete_existing_pdf" value="1" class="badge badge-danger">Remove</button>
								</p>
							</div>
							@else
							<h4>No PDF Found</h4>
							@endif
							<input type="file" accept="application/pdf" class="form-control" name="pdf" id="pdf">
						</div>
					</div>
			   </div>
			</div>
			<div class="col-xl-4">
			   <div class="card-box">
				<h4 class="header-title m-t-0 m-b-30">Action</h4>
				<button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">UPDATE</button>
				<a href="{{route('packages.create')}}" class="btn btn-secondary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD NEW</a>
				<a href="{{route('packages.index')}}" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>
	</form>
@endsection

@section('scripts')
<script>
	jQuery(document).ready(function () {
		$('.thumbnail').hover(
			function () {
				$(this).find('.caption').slideDown(250);
			},
			function () {
				$(this).find('.caption').slideUp(250);
			}
		);
		$("#remove-image").click(function(event){
            if (confirm('Are you sure you want to delete?')) {
                var input = $("<input>")
                .attr("type", "hidden")
                .attr("name", "delete_existing_image")
                .attr("value", 1);
                $("#form").append(input);
            }
			else{
				return false;
			}
		});
	});
</script>
<script>
	$(document).ready(function(){
		$('#is_video').change(function(){
			var is_checked=$('#is_video').prop('checked');
			// alert(is_checked);
			if(is_checked){
				$('#video_cat_div').removeClass('d-none');
				$('#video_cat_div').val('');
				$('#video_link').prop('required', true);
			}
			else{
				$('#video_cat_div').addClass('d-none');
				$('#video_link').prop('required', false);
			}
		});
	});
</script>
<script>
  var uploadedGalleryMap = {}
  Dropzone.options.galleryDropzone = {
    url: '{{ route('packages.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery_image[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery_image[]"][value="' + name + '"]').remove()
    },
    init: function () {
      @if(isset($package) && $package->getMedia('gallery'))
      	@foreach($package->getMedia('gallery') as $media)
      		var file ={!! json_encode($media) !!};
      		var thumbnailUrl = "{!! url($media->getUrl('thumb-medium')) !!}";
      		this.options.addedfile.call(this, file);
      		this.options.thumbnail.call(this, file, thumbnailUrl);
          	file.previewElement.classList.add('dz-complete');
          	$('form').append('<input type="hidden" name="gallery_image[]" value="' + file.file_name + '">');
      	@endforeach
      @endif
    }
  }
</script>
<script type="text/javascript">
	function confirm_delete() {
	  return confirm('Are you sure you want to delete this Brochure ?');
	}
</script>
@endsection