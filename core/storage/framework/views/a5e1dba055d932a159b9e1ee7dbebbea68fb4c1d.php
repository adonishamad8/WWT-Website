	<?php $__env->startSection('content'); ?>
	<?php if(session()->has('message')): ?>
		<div class="alert alert-success">
			<?php echo e(session()->get('message')); ?>

		</div>
	<?php endif; ?>
	<?php if($errors->all()): ?>
		<div class="alert alert-danger">
			<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($error); ?></li>			
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
	<?php endif; ?>
    <form id="form" class="form-horizontal" action="<?php echo e(route('packages.update', $package->id)); ?>" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
		<?php echo method_field('put'); ?>
		<?php echo csrf_field(); ?>
		<div class="row">
			<div class="col-xl-8">
			   <div class="card-box">
				  <h4 class="header-title m-t-0 m-b-30">Edit Content</h4>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label class="col-2 col-form-label">Categories</label>
						<div class="col-8">
							<select class="form-control selectpicker" name="categories[]" multiple data-live-search="true" required>
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($category->id); ?>" <?php if(!empty($package) && in_array($category->id, $package->categories->pluck('id')->toArray())): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
										<input type="text" name="name" value="<?php echo e($package->name); ?>" class="form-control" id="titleEn" placeholder="Title">
									 </div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="image" class="col-sm-2 col-form-label">Image (1200x800px)</label>
						<div class="col-md-9">
							<?php if($package->getFirstMediaUrl('package')): ?>
							<div class="col-md-3 gallery-pages">
								<div class="thumbnail">
									<div class="caption" style="display: none;">
										<h4>Image</h4>
										<p>
										   <a href="<?php echo e($package->getFirstMediaUrl('package', 'thumb-large')); ?>" data-lightbox="example-set" class="example-image-link badge badge-success">View</a>
										   <button id="remove-image" class="badge badge-danger">Remove</button>
										</p>
									</div>
									<img class="article-image" src="<?php echo e($package->getFirstMediaUrl('package', 'thumb')); ?>" width="100">
								</div>
							</div>
							<?php endif; ?>
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
										<textarea id="editor-en" name="description"><?php echo e($package->description); ?></textarea>
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
								<option value="Afghanistan" <?php echo e(old("country", $package->country) == "Afghanistan" ? "selected" : ""); ?>>Afghanistan</option>
								<option value="Åland Islands" <?php echo e(old("country", $package->country) == "Åland Islands" ? "selected" : ""); ?>>Åland Islands</option>
								<option value="Albania" <?php echo e(old("country", $package->country) == "Albania" ? "selected" : ""); ?>>Albania</option>
								<option value="Algeria" <?php echo e(old("country", $package->country) == "Algeria" ? "selected" : ""); ?>>Algeria</option>
								<option value="American Samoa" <?php echo e(old("country", $package->country) == "American Samoa" ? "selected" : ""); ?>>American Samoa</option>
								<option value="Andorra" <?php echo e(old("country", $package->country) == "Andorra" ? "selected" : ""); ?>>Andorra</option>
								<option value="Angola" <?php echo e(old("country", $package->country) == "Angola" ? "selected" : ""); ?>>Angola</option>
								<option value="Anguilla" <?php echo e(old("country", $package->country) == "Anguilla" ? "selected" : ""); ?>>Anguilla</option>
								<option value="Antarctica" <?php echo e(old("country", $package->country) == "Antarctica" ? "selected" : ""); ?>>Antarctica</option>
								<option value="Antigua and Barbuda" <?php echo e(old("country", $package->country) == "Antigua and Barbuda" ? "selected" : ""); ?>>Antigua and Barbuda</option>
								<option value="Argentina" <?php echo e(old("country", $package->country) == "Argentina" ? "selected" : ""); ?>>Argentina</option>
								<option value="Armenia" <?php echo e(old("country", $package->country) == "Armenia" ? "selected" : ""); ?>>Armenia</option>
								<option value="Aruba" <?php echo e(old("country", $package->country) == "Aruba" ? "selected" : ""); ?>>Aruba</option>
								<option value="Australia" <?php echo e(old("country", $package->country) == "Australia" ? "selected" : ""); ?>>Australia</option>
								<option value="Austria" <?php echo e(old("country", $package->country) == "Austria" ? "selected" : ""); ?>>Austria</option>
								<option value="Azerbaijan" <?php echo e(old("country", $package->country) == "Azerbaijan" ? "selected" : ""); ?>>Azerbaijan</option>
								<option value="Bahamas" <?php echo e(old("country", $package->country) == "Bahamas" ? "selected" : ""); ?>>Bahamas</option>
								<option value="Bahrain" <?php echo e(old("country", $package->country) == "Bahrain" ? "selected" : ""); ?>>Bahrain</option>
								<option value="Bangladesh" <?php echo e(old("country", $package->country) == "Bangladesh" ? "selected" : ""); ?>>Bangladesh</option>
								<option value="Barbados" <?php echo e(old("country", $package->country) == "Barbados" ? "selected" : ""); ?>>Barbados</option>
								<option value="Belarus" <?php echo e(old("country", $package->country) == "Belarus" ? "selected" : ""); ?>>Belarus</option>
								<option value="Belgium" <?php echo e(old("country", $package->country) == "Belgium" ? "selected" : ""); ?>>Belgium</option>
								<option value="Belize" <?php echo e(old("country", $package->country) == "Belize" ? "selected" : ""); ?>>Belize</option>
								<option value="Benin" <?php echo e(old("country", $package->country) == "Benin" ? "selected" : ""); ?>>Benin</option>
								<option value="Bermuda" <?php echo e(old("country", $package->country) == "Bermuda" ? "selected" : ""); ?>>Bermuda</option>
								<option value="Bhutan" <?php echo e(old("country", $package->country) == "Bhutan" ? "selected" : ""); ?>>Bhutan</option>
								<option value="Bolivia" <?php echo e(old("country", $package->country) == "Bolivia" ? "selected" : ""); ?>>Bolivia</option>
								<option value="Bosnia and Herzegovina" <?php echo e(old("country", $package->country) == "Bosnia and Herzegovina" ? "selected" : ""); ?>>Bosnia and Herzegovina</option>
								<option value="Botswana" <?php echo e(old("country", $package->country) == "Botswana" ? "selected" : ""); ?>>Botswana</option>
								<option value="Bouvet Island" <?php echo e(old("country", $package->country) == "Bouvet Island" ? "selected" : ""); ?>>Bouvet Island</option>
								<option value="Brazil" <?php echo e(old("country", $package->country) == "Brazil" ? "selected" : ""); ?>>Brazil</option>
								<option value="British Indian Ocean Territory" <?php echo e(old("country", $package->country) == "British Indian Ocean Territory" ? "selected" : ""); ?>>British Indian Ocean Territory</option>
								<option value="Brunei Darussalam" <?php echo e(old("country", $package->country) == "Brunei Darussalam" ? "selected" : ""); ?>>Brunei Darussalam</option>
								<option value="Bulgaria" <?php echo e(old("country", $package->country) == "Bulgaria" ? "selected" : ""); ?>>Bulgaria</option>
								<option value="Burkina Faso" <?php echo e(old("country", $package->country) == "Burkina Faso" ? "selected" : ""); ?>>Burkina Faso</option>
								<option value="Burundi" <?php echo e(old("country", $package->country) == "Burundi" ? "selected" : ""); ?>>Burundi</option>
								<option value="Cambodia" <?php echo e(old("country", $package->country) == "Cambodia" ? "selected" : ""); ?>>Cambodia</option>
								<option value="Cameroon" <?php echo e(old("country", $package->country) == "Cameroon" ? "selected" : ""); ?>>Cameroon</option>
								<option value="Canada" <?php echo e(old("country", $package->country) == "Canada" ? "selected" : ""); ?>>Canada</option>
								<option value="Cape Verde" <?php echo e(old("country", $package->country) == "Cape Verde" ? "selected" : ""); ?>>Cape Verde</option>
								<option value="Cayman Islands" <?php echo e(old("country", $package->country) == "Cayman Islands" ? "selected" : ""); ?>>Cayman Islands</option>
								<option value="Central African Republic" <?php echo e(old("country", $package->country) == "Central African Republic" ? "selected" : ""); ?>>Central African Republic</option>
								<option value="Chad" <?php echo e(old("country", $package->country) == "Chad" ? "selected" : ""); ?>>Chad</option>
								<option value="Chile" <?php echo e(old("country", $package->country) == "Chile" ? "selected" : ""); ?>>Chile</option>
								<option value="China" <?php echo e(old("country", $package->country) == "China" ? "selected" : ""); ?>>China</option>
								<option value="Christmas Island" <?php echo e(old("country", $package->country) == "Christmas Island" ? "selected" : ""); ?>>Christmas Island</option>
								<option value="Cocos (Keeling) Islands" <?php echo e(old("country", $package->country) == "Cocos (Keeling) Islands" ? "selected" : ""); ?>>Cocos (Keeling) Islands</option>
								<option value="Colombia" <?php echo e(old("country", $package->country) == "Colombia" ? "selected" : ""); ?>>Colombia</option>
								<option value="Comoros" <?php echo e(old("country", $package->country) == "Comoros" ? "selected" : ""); ?>>Comoros</option>
								<option value="Congo" <?php echo e(old("country", $package->country) == "Congo" ? "selected" : ""); ?>>Congo</option>
								<option value="Congo, The Democratic Republic of The" <?php echo e(old("country", $package->country) == "Congo, The Democratic Republic" ? "selected" : ""); ?>>Congo, The Democratic Republic</option>
								<option value="Cook Islands" <?php echo e(old("country", $package->country) == "Cook Islands" ? "selected" : ""); ?>>Cook Islands</option>
								<option value="Costa Rica" <?php echo e(old("country", $package->country) == "Costa Rica" ? "selected" : ""); ?>>Costa Rica</option>
								<option value="Cote D'ivoire" <?php echo e(old("country", $package->country) == "Cote D'ivoire" ? "selected" : ""); ?>>Cote D'ivoire</option>
								<option value="Croatia" <?php echo e(old("country", $package->country) == "Croatia" ? "selected" : ""); ?>>Croatia</option>
								<option value="Cuba" <?php echo e(old("country", $package->country) == "Cuba" ? "selected" : ""); ?>>Cuba</option>
								<option value="Cyprus" <?php echo e(old("country", $package->country) == "Cyprus" ? "selected" : ""); ?>>Cyprus</option>
								<option value="Czech Republic" <?php echo e(old("country", $package->country) == "Czech Republic" ? "selected" : ""); ?>>Czech Republic</option>
								<option value="Denmark" <?php echo e(old("country", $package->country) == "Denmark" ? "selected" : ""); ?>>Denmark</option>
								<option value="Djibouti" <?php echo e(old("country", $package->country) == "Djibouti" ? "selected" : ""); ?>>Djibouti</option>
								<option value="Dominica" <?php echo e(old("country", $package->country) == "Dominica" ? "selected" : ""); ?>>Dominica</option>
								<option value="Dominican Republic" <?php echo e(old("country", $package->country) == "Dominican Republic" ? "selected" : ""); ?>>Dominican Republic</option>
								<option value="Ecuador" <?php echo e(old("country", $package->country) == "Ecuador" ? "selected" : ""); ?>>Ecuador</option>
								<option value="Egypt" <?php echo e(old("country", $package->country) == "Egypt" ? "selected" : ""); ?>>Egypt</option>
								<option value="El Salvador" <?php echo e(old("country", $package->country) == "El Salvador" ? "selected" : ""); ?>>El Salvador</option>
								<option value="Equatorial Guinea" <?php echo e(old("country", $package->country) == "Equatorial Guinea" ? "selected" : ""); ?>>Equatorial Guinea</option>
								<option value="Eritrea" <?php echo e(old("country", $package->country) == "Eritrea" ? "selected" : ""); ?>>Eritrea</option>
								<option value="Estonia" <?php echo e(old("country", $package->country) == "Estonia" ? "selected" : ""); ?>>Estonia</option>
								<option value="Ethiopia" <?php echo e(old("country", $package->country) == "Ethiopia" ? "selected" : ""); ?>>Ethiopia</option>
								<option value="Falkland Islands (Malvinas)" <?php echo e(old("country", $package->country) == "Falkland Islands (Malvinas)" ? "selected" : ""); ?>>Falkland Islands (Malvinas)</option>
								<option value="Faroe Islands" <?php echo e(old("country", $package->country) == "Faroe Islands" ? "selected" : ""); ?>>Faroe Islands</option>
								<option value="Fiji" <?php echo e(old("country", $package->country) == "Fiji" ? "selected" : ""); ?>>Fiji</option>
								<option value="Finland" <?php echo e(old("country", $package->country) == "Finland" ? "selected" : ""); ?>>Finland</option>
								<option value="France" <?php echo e(old("country", $package->country) == "France" ? "selected" : ""); ?>>France</option>
								<option value="French Guiana" <?php echo e(old("country", $package->country) == "French Guiana" ? "selected" : ""); ?>>French Guiana</option>
								<option value="French Polynesia" <?php echo e(old("country", $package->country) == "French Polynesia" ? "selected" : ""); ?>>French Polynesia</option>
								<option value="French Southern Territories" <?php echo e(old("country", $package->country) == "French Southern Territories" ? "selected" : ""); ?>>French Southern Territories</option>
								<option value="Gabon" <?php echo e(old("country", $package->country) == "Gabon" ? "selected" : ""); ?>>Gabon</option>
								<option value="Gambia" <?php echo e(old("country", $package->country) == "Gambia" ? "selected" : ""); ?>>Gambia</option>
								<option value="Georgia" <?php echo e(old("country", $package->country) == "Georgia" ? "selected" : ""); ?>>Georgia</option>
								<option value="Germany" <?php echo e(old("country", $package->country) == "Germany" ? "selected" : ""); ?>>Germany</option>
								<option value="Ghana" <?php echo e(old("country", $package->country) == "Ghana" ? "selected" : ""); ?>>Ghana</option>
								<option value="Gibraltar" <?php echo e(old("country", $package->country) == "Gibraltar" ? "selected" : ""); ?>>Gibraltar</option>
								<option value="Greece" <?php echo e(old("country", $package->country) == "Greece" ? "selected" : ""); ?>>Greece</option>
								<option value="Greenland" <?php echo e(old("country", $package->country) == "Greenland" ? "selected" : ""); ?>>Greenland</option>
								<option value="Grenada" <?php echo e(old("country", $package->country) == "Grenada" ? "selected" : ""); ?>>Grenada</option>
								<option value="Guadeloupe" <?php echo e(old("country", $package->country) == "Guadeloupe" ? "selected" : ""); ?>>Guadeloupe</option>
								<option value="Guam" <?php echo e(old("country", $package->country) == "Guam" ? "selected" : ""); ?>>Guam</option>
								<option value="Guatemala" <?php echo e(old("country", $package->country) == "Guatemala" ? "selected" : ""); ?>>Guatemala</option>
								<option value="Guernsey" <?php echo e(old("country", $package->country) == "Guernsey" ? "selected" : ""); ?>>Guernsey</option>
								<option value="Guinea" <?php echo e(old("country", $package->country) == "Guinea" ? "selected" : ""); ?>>Guinea</option>
								<option value="Guinea-bissau" <?php echo e(old("country", $package->country) == "Guinea-bissau" ? "selected" : ""); ?>>Guinea-bissau</option>
								<option value="Guyana" <?php echo e(old("country", $package->country) == "Guyana" ? "selected" : ""); ?>>Guyana</option>
								<option value="Haiti" <?php echo e(old("country", $package->country) == "Haiti" ? "selected" : ""); ?>>Haiti</option>
								<option value="Heard Island and Mcdonald Islands" <?php echo e(old("country", $package->country) == "Heard Island and Mcdonald Islands" ? "selected" : ""); ?>>Heard Island and Mcdonald Islands</option>
								<option value="Holy See (Vatican City State)" <?php echo e(old("country", $package->country) == "Holy See (Vatican City State)" ? "selected" : ""); ?>>Holy See (Vatican City State)</option>
								<option value="Honduras" <?php echo e(old("country", $package->country) == "Honduras" ? "selected" : ""); ?>>Honduras</option>
								<option value="Hong Kong" <?php echo e(old("country", $package->country) == "Hong Kong" ? "selected" : ""); ?>>Hong Kong</option>
								<option value="Hungary" <?php echo e(old("country", $package->country) == "Hungary" ? "selected" : ""); ?>>Hungary</option>
								<option value="Iceland" <?php echo e(old("country", $package->country) == "Iceland" ? "selected" : ""); ?>>Iceland</option>
								<option value="India" <?php echo e(old("country", $package->country) == "India" ? "selected" : ""); ?>>India</option>
								<option value="Indonesia" <?php echo e(old("country", $package->country) == "Indonesia" ? "selected" : ""); ?>>Indonesia</option>
								<option value="Iran, Islamic Republic of" <?php echo e(old("country", $package->country) == "Iran, Islamic Republic of" ? "selected" : ""); ?>>Iran, Islamic Republic of</option>
								<option value="Iraq" <?php echo e(old("country", $package->country) == "Iraq" ? "selected" : ""); ?>>Iraq</option>
								<option value="Ireland" <?php echo e(old("country", $package->country) == "Ireland" ? "selected" : ""); ?>>Ireland</option>
								<option value="Isle of Man" <?php echo e(old("country", $package->country) == "Isle of Man" ? "selected" : ""); ?>>Isle of Man</option>
								<option value="Israel" <?php echo e(old("country", $package->country) == "Israel" ? "selected" : ""); ?>>Israel</option>
								<option value="Italy" <?php echo e(old("country", $package->country) == "Italy" ? "selected" : ""); ?>>Italy</option>
								<option value="Jamaica" <?php echo e(old("country", $package->country) == "Jamaica" ? "selected" : ""); ?>>Jamaica</option>
								<option value="Japan" <?php echo e(old("country", $package->country) == "Japan" ? "selected" : ""); ?>>Japan</option>
								<option value="Jersey" <?php echo e(old("country", $package->country) == "Jersey" ? "selected" : ""); ?>>Jersey</option>
								<option value="Jordan" <?php echo e(old("country", $package->country) == "Jordan" ? "selected" : ""); ?>>Jordan</option>
								<option value="Kazakhstan" <?php echo e(old("country", $package->country) == "Kazakhstan" ? "selected" : ""); ?>>Kazakhstan</option>
								<option value="Kenya" <?php echo e(old("country", $package->country) == "Kenya" ? "selected" : ""); ?>>Kenya</option>
								<option value="Kiribati" <?php echo e(old("country", $package->country) == "Kiribati" ? "selected" : ""); ?>>Kiribati</option>
								<option value="Korea, Democratic People's Republic of" <?php echo e(old("country", $package->country) == "Korea, Democratic People's Republic of" ? "selected" : ""); ?>>Korea, Democratic People's Republic of</option>
								<option value="Korea, Republic of" <?php echo e(old("country", $package->country) == "Korea, Republic of" ? "selected" : ""); ?>>Korea, Republic of</option>
								<option value="Kuwait" <?php echo e(old("country", $package->country) == "Kuwait" ? "selected" : ""); ?>>Kuwait</option>
								<option value="Kyrgyzstan" <?php echo e(old("country", $package->country) == "Kyrgyzstan" ? "selected" : ""); ?>>Kyrgyzstan</option>
								<option value="Lao People's Democratic Republic" <?php echo e(old("country", $package->country) == "Lao People's Democratic Republic" ? "selected" : ""); ?>>Lao People's Democratic Republic</option>
								<option value="Latvia" <?php echo e(old("country", $package->country) == "Latvia" ? "selected" : ""); ?>>Latvia</option>
								<option value="Lebanon" <?php echo e(old("country", $package->country) == "Lebanon" ? "selected" : ""); ?>>Lebanon</option>
								<option value="Lesotho" <?php echo e(old("country", $package->country) == "Lesotho" ? "selected" : ""); ?>>Lesotho</option>
								<option value="Liberia" <?php echo e(old("country", $package->country) == "Liberia" ? "selected" : ""); ?>>Liberia</option>
								<option value="Libyan Arab Jamahiriya" <?php echo e(old("country", $package->country) == "Libyan Arab Jamahiriya" ? "selected" : ""); ?>>Libyan Arab Jamahiriya</option>
								<option value="Liechtenstein" <?php echo e(old("country", $package->country) == "Liechtenstein" ? "selected" : ""); ?>>Liechtenstein</option>
								<option value="Lithuania" <?php echo e(old("country", $package->country) == "Lithuania" ? "selected" : ""); ?>>Lithuania</option>
								<option value="Luxembourg" <?php echo e(old("country", $package->country) == "Luxembourg" ? "selected" : ""); ?>>Luxembourg</option>
								<option value="Macao" <?php echo e(old("country", $package->country) == "Macao" ? "selected" : ""); ?>>Macao</option>
								<option value="Macedonia, The Former Yugoslav Republic of" <?php echo e(old("country", $package->country) == "Macedonia, The Former Yugoslav Republic of" ? "selected" : ""); ?>>Macedonia, The Former Yugoslav Republic of</option>
								<option value="Madagascar" <?php echo e(old("country", $package->country) == "Madagascar" ? "selected" : ""); ?>>Madagascar</option>
								<option value="Malawi" <?php echo e(old("country", $package->country) == "Malawi" ? "selected" : ""); ?>>Malawi</option>
								<option value="Malaysia" <?php echo e(old("country", $package->country) == "Malaysia" ? "selected" : ""); ?>>Malaysia</option>
								<option value="Maldives" <?php echo e(old("country", $package->country) == "Maldives" ? "selected" : ""); ?>>Maldives</option>
								<option value="Mali" <?php echo e(old("country", $package->country) == "Mali" ? "selected" : ""); ?>>Mali</option>
								<option value="Malta" <?php echo e(old("country", $package->country) == "Malta" ? "selected" : ""); ?>>Malta</option>
								<option value="Marshall Islands" <?php echo e(old("country", $package->country) == "Marshall Islands" ? "selected" : ""); ?>>Marshall Islands</option>
								<option value="Martinique" <?php echo e(old("country", $package->country) == "Martinique" ? "selected" : ""); ?>>Martinique</option>
								<option value="Mauritania" <?php echo e(old("country", $package->country) == "Mauritania" ? "selected" : ""); ?>>Mauritania</option>
								<option value="Mauritius" <?php echo e(old("country", $package->country) == "Mauritius" ? "selected" : ""); ?>>Mauritius</option>
								<option value="Mayotte" <?php echo e(old("country", $package->country) == "Mayotte" ? "selected" : ""); ?>>Mayotte</option>
								<option value="Mexico" <?php echo e(old("country", $package->country) == "Mexico" ? "selected" : ""); ?>>Mexico</option>
								<option value="Micronesia, Federated States of" <?php echo e(old("country", $package->country) == "Micronesia, Federated States of" ? "selected" : ""); ?>>Micronesia, Federated States of</option>
								<option value="Moldova, Republic of" <?php echo e(old("country", $package->country) == "Moldova, Republic of" ? "selected" : ""); ?>>Moldova, Republic of</option>
								<option value="Monaco" <?php echo e(old("country", $package->country) == "Monaco" ? "selected" : ""); ?>>Monaco</option>
								<option value="Mongolia" <?php echo e(old("country", $package->country) == "Mongolia" ? "selected" : ""); ?>>Mongolia</option>
								<option value="Montenegro" <?php echo e(old("country", $package->country) == "Montenegro" ? "selected" : ""); ?>>Montenegro</option>
								<option value="Montserrat" <?php echo e(old("country", $package->country) == "Montserrat" ? "selected" : ""); ?>>Montserrat</option>
								<option value="Morocco" <?php echo e(old("country", $package->country) == "Morocco" ? "selected" : ""); ?>>Morocco</option>
								<option value="Mozambique" <?php echo e(old("country", $package->country) == "Mozambique" ? "selected" : ""); ?>>Mozambique</option>
								<option value="Myanmar" <?php echo e(old("country", $package->country) == "Myanmar" ? "selected" : ""); ?>>Myanmar</option>
								<option value="Namibia" <?php echo e(old("country", $package->country) == "Namibia" ? "selected" : ""); ?>>Namibia</option>
								<option value="Nauru" <?php echo e(old("country", $package->country) == "Nauru" ? "selected" : ""); ?>>Nauru</option>
								<option value="Nepal" <?php echo e(old("country", $package->country) == "Nepal" ? "selected" : ""); ?>>Nepal</option>
								<option value="Netherlands" <?php echo e(old("country", $package->country) == "Netherlands" ? "selected" : ""); ?>>Netherlands</option>
								<option value="Netherlands Antilles" <?php echo e(old("country", $package->country) == "Netherlands Antilles" ? "selected" : ""); ?>>Netherlands Antilles</option>
								<option value="New Caledonia" <?php echo e(old("country", $package->country) == "New Caledonia" ? "selected" : ""); ?>>New Caledonia</option>
								<option value="New Zealand" <?php echo e(old("country", $package->country) == "New Zealand" ? "selected" : ""); ?>>New Zealand</option>
								<option value="Nicaragua" <?php echo e(old("country", $package->country) == "Nicaragua" ? "selected" : ""); ?>>Nicaragua</option>
								<option value="Niger" <?php echo e(old("country", $package->country) == "Niger" ? "selected" : ""); ?>>Niger</option>
								<option value="Nigeria" <?php echo e(old("country", $package->country) == "Nigeria" ? "selected" : ""); ?>>Nigeria</option>
								<option value="Niue" <?php echo e(old("country", $package->country) == "Niue" ? "selected" : ""); ?>>Niue</option>
								<option value="Norfolk Island" <?php echo e(old("country", $package->country) == "Norfolk Island" ? "selected" : ""); ?>>Norfolk Island</option>
								<option value="Northern Mariana Islands" <?php echo e(old("country", $package->country) == "Northern Mariana Islands" ? "selected" : ""); ?>>Northern Mariana Islands</option>
								<option value="Norway" <?php echo e(old("country", $package->country) == "Norway" ? "selected" : ""); ?>>Norway</option>
								<option value="Oman" <?php echo e(old("country", $package->country) == "Oman" ? "selected" : ""); ?>>Oman</option>
								<option value="Pakistan" <?php echo e(old("country", $package->country) == "Pakistan" ? "selected" : ""); ?>>Pakistan</option>
								<option value="Palau" <?php echo e(old("country", $package->country) == "Palau" ? "selected" : ""); ?>>Palau</option>
								<option value="Palestinian Territory, Occupied" <?php echo e(old("country", $package->country) == "Palestinian Territory, Occupied" ? "selected" : ""); ?>>Palestinian Territory, Occupied</option>
								<option value="Panama" <?php echo e(old("country", $package->country) == "Panama" ? "selected" : ""); ?>>Panama</option>
								<option value="Papua New Guinea" <?php echo e(old("country", $package->country) == "Papua New Guinea" ? "selected" : ""); ?>>Papua New Guinea</option>
								<option value="Paraguay" <?php echo e(old("country", $package->country) == "Paraguay" ? "selected" : ""); ?>>Paraguay</option>
								<option value="Peru" <?php echo e(old("country", $package->country) == "Peru" ? "selected" : ""); ?>>Peru</option>
								<option value="Philippines" <?php echo e(old("country", $package->country) == "Philippines" ? "selected" : ""); ?>>Philippines</option>
								<option value="Pitcairn" <?php echo e(old("country", $package->country) == "Pitcairn" ? "selected" : ""); ?>>Pitcairn</option>
								<option value="Poland" <?php echo e(old("country", $package->country) == "Poland" ? "selected" : ""); ?>>Poland</option>
								<option value="Portugal" <?php echo e(old("country", $package->country) == "Portugal" ? "selected" : ""); ?>>Portugal</option>
								<option value="Puerto Rico" <?php echo e(old("country", $package->country) == "Puerto Rico" ? "selected" : ""); ?>>Puerto Rico</option>
								<option value="Qatar" <?php echo e(old("country", $package->country) == "Qatar" ? "selected" : ""); ?>>Qatar</option>
								<option value="Reunion" <?php echo e(old("country", $package->country) == "Reunion" ? "selected" : ""); ?>>Reunion</option>
								<option value="Romania" <?php echo e(old("country", $package->country) == "Romania" ? "selected" : ""); ?>>Romania</option>
								<option value="Russian Federation" <?php echo e(old("country", $package->country) == "Russian Federation" ? "selected" : ""); ?>>Russian Federation</option>
								<option value="Rwanda" <?php echo e(old("country", $package->country) == "Rwanda" ? "selected" : ""); ?>>Rwanda</option>
								<option value="Saint Helena" <?php echo e(old("country", $package->country) == "Saint Helena" ? "selected" : ""); ?>>Saint Helena</option>
								<option value="Saint Kitts and Nevis" <?php echo e(old("country", $package->country) == "Saint Kitts and Nevis" ? "selected" : ""); ?>>Saint Kitts and Nevis</option>
								<option value="Saint Lucia" <?php echo e(old("country", $package->country) == "Saint Lucia" ? "selected" : ""); ?>>Saint Lucia</option>
								<option value="Saint Pierre and Miquelon" <?php echo e(old("country", $package->country) == "Saint Pierre and Miquelon" ? "selected" : ""); ?>>Saint Pierre and Miquelon</option>
								<option value="Saint Vincent and The Grenadines" <?php echo e(old("country", $package->country) == "Saint Vincent and The Grenadines" ? "selected" : ""); ?>>Saint Vincent and The Grenadines</option>
								<option value="Samoa" <?php echo e(old("country", $package->country) == "Samoa" ? "selected" : ""); ?>>Samoa</option>
								<option value="San Marino" <?php echo e(old("country", $package->country) == "San Marino" ? "selected" : ""); ?>>San Marino</option>
								<option value="Sao Tome and Principe" <?php echo e(old("country", $package->country) == "Sao Tome and Principe" ? "selected" : ""); ?>>Sao Tome and Principe</option>
								<option value="Saudi Arabia" <?php echo e(old("country", $package->country) == "Saudi Arabia" ? "selected" : ""); ?>>Saudi Arabia</option>
								<option value="Senegal" <?php echo e(old("country", $package->country) == "Senegal" ? "selected" : ""); ?>>Senegal</option>
								<option value="Serbia" <?php echo e(old("country", $package->country) == "Serbia" ? "selected" : ""); ?>>Serbia</option>
								<option value="Seychelles" <?php echo e(old("country", $package->country) == "Seychelles" ? "selected" : ""); ?>>Seychelles</option>
								<option value="Sierra Leone" <?php echo e(old("country", $package->country) == "Sierra Leone" ? "selected" : ""); ?>>Sierra Leone</option>
								<option value="Singapore" <?php echo e(old("country", $package->country) == "Singapore" ? "selected" : ""); ?>>Singapore</option>
								<option value="Slovakia" <?php echo e(old("country", $package->country) == "Slovakia" ? "selected" : ""); ?>>Slovakia</option>
								<option value="Slovenia" <?php echo e(old("country", $package->country) == "Slovenia" ? "selected" : ""); ?>>Slovenia</option>
								<option value="Solomon Islands" <?php echo e(old("country", $package->country) == "Solomon Islands" ? "selected" : ""); ?>>Solomon Islands</option>
								<option value="Somalia" <?php echo e(old("country", $package->country) == "Somalia" ? "selected" : ""); ?>>Somalia</option>
								<option value="South Africa" <?php echo e(old("country", $package->country) == "South Africa" ? "selected" : ""); ?>>South Africa</option>
								<option value="South Georgia and The South Sandwich Islands" <?php echo e(old("country", $package->country) == "South Georgia and The South Sandwich Islands" ? "selected" : ""); ?>>South Georgia and The South Sandwich Islands</option>
								<option value="Spain" <?php echo e(old("country", $package->country) == "Spain" ? "selected" : ""); ?>>Spain</option>
								<option value="Sri Lanka" <?php echo e(old("country", $package->country) == "Sri Lanka" ? "selected" : ""); ?>>Sri Lanka</option>
								<option value="Sudan" <?php echo e(old("country", $package->country) == "Sudan" ? "selected" : ""); ?>>Sudan</option>
								<option value="Suriname" <?php echo e(old("country", $package->country) == "Suriname" ? "selected" : ""); ?>>Suriname</option>
								<option value="Svalbard and Jan Mayen" <?php echo e(old("country", $package->country) == "Svalbard and Jan Mayen" ? "selected" : ""); ?>>Svalbard and Jan Mayen</option>
								<option value="Swaziland" <?php echo e(old("country", $package->country) == "Swaziland" ? "selected" : ""); ?>>Swaziland</option>
								<option value="Sweden" <?php echo e(old("country", $package->country) == "Sweden" ? "selected" : ""); ?>>Sweden</option>
								<option value="Switzerland" <?php echo e(old("country", $package->country) == "Switzerland" ? "selected" : ""); ?>>Switzerland</option>
								<option value="Syrian Arab Republic" <?php echo e(old("country", $package->country) == "Syrian Arab Republic" ? "selected" : ""); ?>>Syrian Arab Republic</option>
								<option value="Taiwan" <?php echo e(old("country", $package->country) == "Taiwan" ? "selected" : ""); ?>>Taiwan</option>
								<option value="Tajikistan" <?php echo e(old("country", $package->country) == "Tajikistan" ? "selected" : ""); ?>>Tajikistan</option>
								<option value="Tanzania, United Republic of" <?php echo e(old("country", $package->country) == "Tanzania, United Republic" ? "selected" : ""); ?>>Tanzania, United Republic</option>
								<option value="Thailand" <?php echo e(old("country", $package->country) == "Thailand" ? "selected" : ""); ?>>Thailand</option>
								<option value="Timor-leste" <?php echo e(old("country", $package->country) == "Timor-leste" ? "selected" : ""); ?>>Timor-leste</option>
								<option value="Togo" <?php echo e(old("country", $package->country) == "Togo" ? "selected" : ""); ?>>Togo</option>
								<option value="Tokelau" <?php echo e(old("country", $package->country) == "Tokelau" ? "selected" : ""); ?>>Tokelau</option>
								<option value="Tonga" <?php echo e(old("country", $package->country) == "Tonga" ? "selected" : ""); ?>>Tonga</option>
								<option value="Trinidad and Tobago" <?php echo e(old("country", $package->country) == "Trinidad and Tobago" ? "selected" : ""); ?>>Trinidad and Tobago</option>
								<option value="Tunisia" <?php echo e(old("country", $package->country) == "Tunisia" ? "selected" : ""); ?>>Tunisia</option>
								<option value="Turkey" <?php echo e(old("country", $package->country) == "Turkey" ? "selected" : ""); ?>>Turkey</option>
								<option value="Turkmenistan" <?php echo e(old("country", $package->country) == "Turkmenistan" ? "selected" : ""); ?>>Turkmenistan</option>
								<option value="Turks and Caicos Islands" <?php echo e(old("country", $package->country) == "Turks and Caicos Islands" ? "selected" : ""); ?>>Turks and Caicos Islands</option>
								<option value="Tuvalu" <?php echo e(old("country", $package->country) == "Tuvalu" ? "selected" : ""); ?>>Tuvalu</option>
								<option value="Uganda" <?php echo e(old("country", $package->country) == "Uganda" ? "selected" : ""); ?>>Uganda</option>
								<option value="Ukraine" <?php echo e(old("country", $package->country) == "Ukraine" ? "selected" : ""); ?>>Ukraine</option>
								<option value="United Arab Emirates" <?php echo e(old("country", $package->country) == "United Arab Emirates" ? "selected" : ""); ?>>United Arab Emirates</option>
								<option value="United Kingdom" <?php echo e(old("country", $package->country) == "United Kingdom" ? "selected" : ""); ?>>United Kingdom</option>
								<option value="United States" <?php echo e(old("country", $package->country) == "United States" ? "selected" : ""); ?>>United States</option>
								<option value="United States Minor Outlying Islands" <?php echo e(old("country", $package->country) == "United States Minor Outlying Islands" ? "selected" : ""); ?>>United States Minor Outlying Islands</option>
								<option value="Uruguay" <?php echo e(old("country", $package->country) == "Uruguay" ? "selected" : ""); ?>>Uruguay</option>
								<option value="Uzbekistan" <?php echo e(old("country", $package->country) == "Uzbekistan" ? "selected" : ""); ?>>Uzbekistan</option>
								<option value="Vanuatu" <?php echo e(old("country", $package->country) == "Vanuatu" ? "selected" : ""); ?>>Vanuatu</option>
								<option value="Venezuela" <?php echo e(old("country", $package->country) == "Venezuela" ? "selected" : ""); ?>>Venezuela</option>
								<option value="Viet Nam" <?php echo e(old("country", $package->country) == "Viet Nam" ? "selected" : ""); ?>>Viet Nam</option>
								<option value="Virgin Islands, British" <?php echo e(old("country", $package->country) == "Virgin Islands, British" ? "selected" : ""); ?>>Virgin Islands, British</option>
								<option value="Virgin Islands, U.S." <?php echo e(old("country", $package->country) == "Virgin Islands, U.S." ? "selected" : ""); ?>>Virgin Islands, U.S.</option>
								<option value="Wallis and Futuna" <?php echo e(old("country", $package->country) == "Wallis and Futuna" ? "selected" : ""); ?>>Wallis and Futuna</option>
								<option value="Western Sahara" <?php echo e(old("country", $package->country) == "Western Sahara" ? "selected" : ""); ?>>Western Sahara</option>
								<option value="Yemen" <?php echo e(old("country", $package->country) == "Yemen" ? "selected" : ""); ?>>Yemen</option>
								<option value="Zambia" <?php echo e(old("country", $package->country) == "Zambia" ? "selected" : ""); ?>>Zambia</option>
								<option value="Zimbabwe" <?php echo e(old("country", $package->country) == "Zimbabwe" ? "selected" : ""); ?>>Zimbabwe</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="date" class="col-sm-2 col-form-label">Date</label>
						<div class="col-sm-8">
							<input type="text" name="date" class="form-control" value="<?php echo e($package->date); ?>" id="date" placeholder="Date">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="price" class="col-sm-2 col-form-label">Price</label>
						<div class="col-sm-8">
							<input type="text" name="price" class="form-control" value="<?php echo e($package->price); ?>" id="price" placeholder="Price">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="is_video" class="col-sm-2 col-form-label">Is Video</label>
						<div class="col-sm-1">
							<div class="checkbox checkbox-primary edit-checkbox">
								<input type="checkbox" name="is_video" class="form-control" id="is_video" value="1" <?php echo e(($package->is_video=="1")? "checked" : ""); ?>>
								<label for="is_video"></label>
							</div>
						</div>
					</div>
					<div class="form-group row <?php echo e(($package->is_video=="1")? "" : "d-none"); ?>" id="video_cat_div">
						<div class="col-md-1"></div>
						<label for="icon" class="col-sm-2 col-form-label">Video Link</label>
						<div class="col-sm-8">
							<input type="text" name="video_link" class="form-control" value="<?php echo e($package->video_link); ?>" id="video_link" placeholder="Video Link">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="featured" class="col-sm-2 col-form-label">Featured</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="featured" class="form-control" id="featured" value="1" <?php echo e(($package->featured=="1")? "checked" : ""); ?>>
								<span class="slider round"></span>
							</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="published" class="col-sm-2 col-form-label">Published</label>
						<div class="col-sm-1">
							<label class="switch">
								<input type="checkbox" name="published" class="form-control" id="published" value="1" <?php echo e(($package->published=="1")? "checked" : ""); ?>>
								<span class="slider round"></span>
							</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-1"></div>
						<label for="tags" class="col-sm-2 col-form-label">SEO Keywords</label>
						<div class="col-sm-8">
							<input type="text" name="tag_list" value="<?php echo e($package->tag_list); ?>" data-role="tagsinput" placeholder="add keywords"/>
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
							<?php if(file_exists(public_path('uploads/'. $package->pdf_name. '.pdf'))): ?>
							<div class="caption">
								<h4>Current PDF</h4>
								<p>
									<a href="<?php echo e(route('downloadPdf', $package->pdf_name)); ?>" class="badge badge-inverse cv-down">Download PDF</a>
									<button id="remove-image" onclick="return confirm_delete()" name="delete_existing_pdf" value="1" class="badge badge-danger">Remove</button>
								</p>
							</div>
							<?php else: ?>
							<h4>No PDF Found</h4>
							<?php endif; ?>
							<input type="file" accept="application/pdf" class="form-control" name="pdf" id="pdf">
						</div>
					</div>
			   </div>
			</div>
			<div class="col-xl-4">
			   <div class="card-box">
				<h4 class="header-title m-t-0 m-b-30">Action</h4>
				<button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">UPDATE</button>
				<a href="<?php echo e(route('packages.create')); ?>" class="btn btn-secondary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">ADD NEW</a>
				<a href="<?php echo e(route('packages.index')); ?>" class="btn btn-primary btn-rounded w-md waves-effect waves-light m-b-5" style="width:100%;">BACK</a>
			   </div>
			</div>
		</div>
	</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
    url: '<?php echo e(route('packages.storeMedia')); ?>',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
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
      <?php if(isset($package) && $package->getMedia('gallery')): ?>
      	<?php $__currentLoopData = $package->getMedia('gallery'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      		var file =<?php echo json_encode($media); ?>;
      		var thumbnailUrl = "<?php echo url($media->getUrl('thumb-medium')); ?>";
      		this.options.addedfile.call(this, file);
      		this.options.thumbnail.call(this, file, thumbnailUrl);
          	file.previewElement.classList.add('dz-complete');
          	$('form').append('<input type="hidden" name="gallery_image[]" value="' + file.file_name + '">');
      	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    }
  }
</script>
<script type="text/javascript">
	function confirm_delete() {
	  return confirm('Are you sure you want to delete this Brochure ?');
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.cmslayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u133514729/domains/worldwidetravel-lb.com/public_html/core/resources/views/admin/packages/edit.blade.php ENDPATH**/ ?>