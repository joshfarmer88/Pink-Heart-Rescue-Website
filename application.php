
<h2>Apply for Adoption</h2>

<div style='text-align: center;'>
<div class="dogdiv">
<div class="dogtable">

<span style="font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: gray;">

</br>
<i>Ready to adopt? Fill out the form below.</i>
<br>
<br>

<form action="submitApplication.php" method="POST">

Adopter Name:<br>
<input type="text" name="name" required>
<br>
<br>

Adopter Email:<br>
<input type="text" name="email" required>
<br>
<br>

Adopter Address:<br>
<input type="text" name="address">
<br>
<br>

Adopter Phone:<br>
<input type="text" name="phone" maxlength="10" required>
<br>
<br>


<?php $dogName = $_GET['dogName']; ?>
Why do you feel <b><?php echo $dogName; ?></b> is best for you?<br>
<textarea name="whyDog" style="height:200px; resize: none;"></textarea>
<input type="hidden" name="dog" value="<?php echo $dogName ?>">
<br>
<br>

List all adult members of your household:<br>
<b>Formatted as:</b></br>
Name, Age, Relation to you, Employer<br>
Name, Age, Relation to you, Employer<br>
<textarea name="adults" style="height:200px; resize: none;"></textarea>
<br>
<br>

Are all members of your household aware and supportive of adding this dog to your family?
<input type="checkbox" name="supportive" value="1">
<br>
<br>

Does anyone in your household have dog allergies?
<input type="checkbox" name="allergy" value="1">
<br>
<br>

Do you have any children in the household?
<input type="checkbox" name="children" value="1">
<br>
<br>

If there are children, please list their names and ages:<br>
<b>Formatted as:</b></br>
Name, Age<br>
Name, Age<br>
<textarea name="childrenDetail" style="height:200px; resize: none;"></textarea>
<br>
<br>

Do you have any other pets?
<input type="checkbox" name="pets" value="1">
<br>
<br>

If you do have other pets, please list their name, age, breed, gender, and whether they are spayed/neutered:<br>
<b>Formatted as:</b></br>
Name, Age, Breed, Gender, Spayed/Neutered<br>
Name, Age, Breed, Gender, Spayed/Neutered<br>
<textarea name="petsDetails" style="height:200px; resize: none;"></textarea>
<br>
<br>

Do you have a fence?
<input type="checkbox" name="fence" value="1">
<br>
<br>

What kind of fence?<br>
<input type="text" name="fenceType">
<br>
<br>

Have you ever had to surrender a pet to a rescue or shelter?
<input type="checkbox" name="surrender" value="1">
<br>
<br>

If yes, why?<br>
<textarea name="surrenderReason" style="height:200px; resize: none;"></textarea>
<br>
<br>

Have you ever sold an animal on Facebook, Craigslist, or another site?
<input type="checkbox" name="sold" value="1">
<br>
<br>

If yes, why?<br>
<textarea name="soldReason" style="height:200px; resize: none;"></textarea>
<br>
<br>

Please list as specifically as possible your pet ownership experience:<br>
<textarea name="experience" style="height:200px; resize: none;"></textarea>
<br>
<br>

Have you ever owned this breed of dog before?
<input type="checkbox" name="breedBefore" value="1">
<br>
<br>

If not, what do you know about this breed?<br>
<textarea name="breedKnowledge" style="height:200px; resize: none;"></textarea>
<br>
<br>

Have you ever owned a double merle and/or a blind or deaf dog?:
<input type="checkbox" name="merleOwn" value="1">
<br>
<br>

Are you aware of the special needs it requires to take care of a double merle dog?:<br>
(training, vet expenses, temperament, general cost)
<input type="checkbox" name="merleNeeds" value="1">
<br>
<br>

What are some areas of knowledge we can help you understand better to make this a successful adoption?<br>
<input type="text" name="addInfo">
<br>
<br>


<br>
Please initial to acknowledge each of the following:
<br>
<br>

<input type="text" name="initial1" "style: size='2'" maxlength="2" required></br>
Do you agree to comply with a home inspection before adoption?
<br>
<br>

<input type="text" name="initial2" size="2" maxlength="2" required></br>
Do you agree to a home visit after the adoption has taken place?
<br>
<br>

<input type="text" name="initial3" size="2" maxlength="2" required></br>
Do you agree to only surrender the dog back to Pink Heart Rescue if you choose the adoption was not a proper fit?
<br>
<br>

<input type="text" name="initial4" size="2" maxlength="2" required></br>
Do you agree to attend an 8 week training course provided by us or supply us with a receipt that your new dog has been signed up to complete training elsewhere?
<br>
<br>

<input type="text" name="initial5" size="2" maxlength="2" required></br>
Do you agree to keep up with yearly vaccinations, physical exams and flea/heartworm preventative?
<br>
<br>

<input type="text" name="initial6" size="2" maxlength="2" required></br>
Do you agree that the dog will be kept as a pet only, and will be spayed or neutered within six months (or when they turn 18 months old), as well as provide proof?
<br>
<br>

<input type="text" name="initial7" size="2" maxlength="2" required></br>
Do you agree that everything on this form is truthful?
<br>
<br>

<br>
Please enter the information of your current veterinarian.<br>
If you do not have a current veterinarian, leave this area blank.<br><br>

Current Vet:<br>
<input type="text" name="vetName">
<br>
<br>

Vet Address:<br>
<input type="text" name="vetAddress">
<br>
<br>

Vet Phone:<br>
<input type="text" name="vetPhone" maxlength="10">
<br>
<br>


<br>
Please add two references.<br><br>

Reference 1:<br>

Name:<br>
<input type="text" name="ref1Name">
<br>
<br>

Relationship:<br>
<input type="text" name="ref1Relation">
<br>
<br>

Contact Number:<br>
<input type="text" name="ref1Phone" maxlength="10">
<br>
<br>

<br>
Reference 2:<br>

Name:<br>
<input type="text" name="ref2Name">
<br>
<br>

Relationship:<br>
<input type="text" name="ref2Relation">
<br>
<br>

Contact Number:<br>
<input type="text" name="ref2Phone" maxlength="10">
<br>
<br>
<br>

<input type="submit" value="Submit" name="submit">
</br>
</br>

</form>

</span>

</div>
</div>
</div>