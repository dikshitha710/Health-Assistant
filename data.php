<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
include ("connection.php");
$data[0]='<br><b>CHICKEN POX</b><br>
          <b>Symptoms:</b><br>
             1. Fever, headache and loss of appetite<br>
             2. Dark red-coloured rash on the back and chest which spreads on the whole body<br>
             3. Later, rashes change into vesicles<br>
          <b>Physical Examine:</b><br>
          1. Skin Allergy (Papules on skin, crust on skin, vesicles on skin)<br>
          <b>Prevention and cure:</b><br>
          There is no vaccine against chicken pox as yet. But precautions must be taken as follows:<br>
             1. The patient should be kept in isolation.<br>
             2. Clothing and utensils, used by the patient should be sterilised.<br>
             3. Fallen scabs should be collected and burnt.<br>
             4. One attack of chicken pox gives lifelong immunity to the person recovered from this disease.<br>';
$data[1]='<br><b>MEASLES</b><br>
          <b>Symptoms:</b><br>
             1. Common cold <br>
             2. Appearance of small white patches in mouth and throat<br>
             3. Appearance of rashes on the body<br>
          <b>Physical Examine:</b><br>
             1. Conjunctivitis<br>
          <b>Prevention and cure:</b><br>
          1. The patient should be kept in isolation.<br>
	  2. Cleanliness should be maintained.<br>
	  3. Antibiotics check only the secondary infections which can easily recur.<br>';
$data[2]='<br><b>DENGUE FEVER</b><br>
          <b>Symptoms:</b><br>
             1. Sudden onset of high fever, generally 104-105 °F (40 °C), which may last 4- 5 days <br>
             2. Severe headache mostly in the forehead<br>
             3. Pain in the joints and muscles, body aches<br>
	     4. Pain behind the eyes which worsens with eye movement<br>
             5. Nausea or vomiting<br>
          <b>Prevention and cure:</b><br>
       	  Following steps can be taken to prevent spread of dengue fever: <br>
	  1. Avoid water stagnation for more than 72 hours so that the mosquitoes do not breed there.<br>
	  2. Prevent mosquito breeding in stored water bodies, like ponds, and wells.<br>
	  3. Destroy discarded objects like old tyres and bottles, as they collect and store Health rainwater.<br>
	  4. Use mosquito repellents and wear long sleeved clothes to curtail exposure.<br>
	  5. Use mosquito nets, also during daytime.<br>
	  6. Avoid outdoor activities during dawn or dusk when these mosquitoes are most active.<br>
	  7. Patients suffering from dengue fever must be isolated for at least 5 days.<br>
	  8. Report to the nearest health centre for any suspected case of Dengue fever.<br>';
$data[3]='<br><b>TUBERCULOSIS</b><br>
          <b>Symptoms:</b><br>
             1. Persistent fever and coughing<br>
             2. Chest pain and blood comes out with the sputum<br>
             3. General weakness<br>
          <b>Physical Examine:</b><br>
          1. Sweat<br>
          <b>Prevention and cure:</b><br>
          1. Isolation of patient to avoid spread of infection.<br>
	  2. BCG vaccination is given to children as a preventive measure.<br>
	  3. Living rooms should be airy, neat and with clean surroundings.<br>
	  4. Antibiotics be administered as treatment.<br>';
$data[4]='<br><b>TYPHOID</b><br>
          <b>Symptoms:</b><br>
             1. Continuous fever, headache, slow pulse rate<br>
             2. Reddish rashes appear on the belly<br>
             3. In extreme cases, ulcers may rupture resulting in death of the patient<br>
          <b>Physical Examine:</b><br>
          1. Distress<br>
	  2. Sunken Eyes<br>
          <b>Lab Results:</b><br>
          1. Low Blood Pressure (BP)<br>
          <b>Prevention and cure:</b><br>
          1. Anti-typhoid inoculation should be given.<br>
	  2. Avoid taking exposed food and drinks.<br>
	  3. Proper sanitation and cleanliness should be maintained.<br>
	  4. Proper disposal of excreta of the patient.<br>
	  5. Antibiotics should be administered.<br>';
$data[5]='<br><b>CHOLERA</b><br>
          <b>Symptoms:</b><br>
             1. Acute diarrhea and watery stool<br>
             2. Muscular cramps/ pains<br>
             3. Loss of minerals through urine<br>
             4. Dehydration leads to death<br>
          <b>Physical Examine:</b><br>
          1. Tachycardia<br>
	  2. Dehydration<br>
	  3. Sunken Eyes<br>
          <b>Lab Results:</b><br>
          1. Low Blood Pressure (BP)<br>
          <b>Prevention and cure:</b><br>
          1. Cholera vaccination should be given.<br>
	  2. Electrolytes (Na, K, sugar) dissolved in water should be given to the patient to check dehydration (In market it is available as ORS–oral rehydration solution).<br>
	  3. Proper washing and cooking of food.<br>
	  4. Proper disposal of vomit and human excreta.<br>
	  5. Flies should not be allowed to sit on eatables and utensils.<br>';
$data[6]='<br><b>MALARIA</b><br>
          <b>Symptoms:</b><br>
             1. Headache, nausea and muscular pain<br>
             2. Feeling of chilliness and shivering followed by fever which becomes normal along with sweating after some time<br>
             3. The patient becomes weak and anaemic <br>
             4. If not treated properly secondary complications may lead to death<br>
          <b>Physical Examine:</b><br>
          1. Tachycardia<br>
	  2. Distress<br>
          <b>Lab Results:</b><br>
          1. Low Blood Pressure (BP)<br>
          <b>Prevention and cure:</b><br>
          1. Fitting of double door and windows (with “Jali” i.e. wire mesh) in the house to prevent entry of mosquitoes.<br>
	  2. Use of mosquito net and mosquito repellents.<br>
	  3. No water should be allowed to collect in ditches or other open spaces to prevent mosquito breeding.<br>
	  4. Sprinkling of kerosene oil in ditches or other open spaces where water gets collected.<br>
	  5. Antimalarial drugs to be taken.<br>';
$data[7]='<br><b>DIABETES MELLITUS</b><br>
          <b>Symptoms:</b><br>
             1. More glucose in blood<br>
             2. Excessive and frequent passing of urine<br>
             3. Feeling thirsty and hungry frequently<br>
             4. Reduced healing capacity of injury<br>
             5. Fever<br>
             6. General weakness/ pains of the body<br>
	     7. In extreme cases diabetic coma can take place making the patient unconscious<br>
          <b>Lab Results:</b><br>
          1. High Blood Pressure (BP)<br>
          2. Sugar<br>
          <b>Prevention and cure:</b><br>
          1. Control the excessive weight of the body.<br>
	  2. A regulated and controlled diet is to be taken.<br>
	  3. The food should not contain sugar and much carbohydrates.<br>
	  4. Injection of insulin before meals, if required (only on doctor’s prescription).<br>';
$data[8]='<br><b>COVID-19</b><br>
          <b>SymptomS:</b><br> Symptoms may also vary in different age groups. Some of the more commonly reported symptoms include,<br>
             1. New or worsening cough and cold<br>
             2. Shortness of breath or difficulty breathing<br>
             3. Temperature equal to or over 38°<br>
             4. Feeling feverish<br>
             5. Chills<br>
             6. Fatigue or weakness<br>
	     7. Muscle or body aches<br>
             8. New loss of smell or taste<br>
             9. Headache<br>
	    10. Gastrointestinal symptoms (abdominal pain, diarrhea, vomiting)<br>
            11. Feeling very unwell<br>
          <b>Physical Examine:</b><br>
          1. Distress<br>
	  2. Sunken Eyes<br>
          <b>Prevention and cure:</b><br>
          1. Wash your hands frequently for at least 20 seconds at a time with warm water and soap.<br>
	  2. Don’t touch your face, eyes, nose, or mouth when your hands are dirty.<br>
	  3. Don’t go out if you’re feeling sick or have any cold or flu symptoms.<br>
	  4. Stay 2 meters away from people.<br>
          5. Cover your mouth with a tissue or the inside of your elbow whenever you sneeze or cough.Throw away any tissues you use right away.<br>
	  6. Clean any objects you touch a lot. Use disinfectants on objects like phones, computers, and doorknobs. Use soap and water for objects that you cook or eat with, like utensils and dishware.<br>';
    if($suggestion == 'Chicken Pox')
    {
      echo $data[0];
    }
    if($suggestion == 'Measles')
    {
      echo $data[1];
    }
    if($suggestion == 'Dengue Fever')
    {
      echo $data[2];
    }
    if($suggestion == 'Tuberculosis')
    {
      echo $data[3];
    }
    if($suggestion == 'Typhoid')
    {
      echo $data[4];
    }
    if($suggestion == 'Cholera')
    {
      echo $data[5];
    }
    if($suggestion == 'Malaria')
    {
      echo $data[6];
    }
    if($suggestion == 'Diabetes Mellitus')
    {
      echo $data[7];
    }
    if($suggestion == 'COVID-19')
    {
      echo $data[8];
    }
?>
