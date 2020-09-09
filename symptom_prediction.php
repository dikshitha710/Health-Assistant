<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
include ("connection.php");
// extratcing the column names i.e. disease names from the user entered symptoms
$query1="SELECT * FROM user_symptoms WHERE user='$_SESSION[user]'";
$i=0;
if($result1 = $con->query($query1))
{
    $row = $result1->fetch_assoc();
    if($row["Fever"]==1)
    {
        $z[$i]='Fever';
        $i = $i + 1;
    }
    if($row["Cold"]==1)
    {
        $z[$i]='Cold';
        $i = $i + 1;
    }
    if($row["Headache"]==1)
    {
        $z[$i]='Headache';
        $i = $i + 1;
    }
    if($row["Rashes"]==1)
    {
        $z[$i]='Rashes';
        $i = $i + 1;
    }
    if($row["Pains"]==1)
    {
      $z[$i]='Pains';
      $i = $i + 1;
    }
    if($row["LossofAppetite"]==1)
    {
      $z[$i]='';
      $i = $i + 1;
    }
    if($row["Patches"]==1)
    {
      $z[$i]='Patches';
      $i = $i + 1;
    }
    if($row["Vomiting"]==1)
    {
      $z[$i]='Vomiting';
      $i = $i + 1;
    }
    if($row["Cough"]==1)
    {
      $z[$i]='Cough';
      $i = $i + 1;
    }
}
// calculating the probability of user entered symptoms
if($z)
{
  $p = round((sizeof($z))/9,3);
}
else
{
  $p=0;
}
// extracting the approximate disease with almost equal symtpoms
$z1='';
for($i=0;$i<sizeof($z);$i++)
{
    $z1 = $z1.$z[$i].' = 1';
    $q1[$i] = "SELECT Disease FROM symptoms WHERE ".$z1;
    //echo $q1[$i].'<br>';
    $k = 0;
    if($re1 = $con->query($q1[$i]))
    {
        if ($row=$re1->fetch_assoc())
        {
          $l=0;
          do
          {
              $d = $row["Disease"];
              $ds[$k] = $d;
              $k++;$l++;
              //echo $d.' ';
          }while($row=$re1->fetch_assoc());

        }

    }

    $z1 = $z1.' && ';
    //echo '<br>match end<br>';
}
// finalizing the disease array
for($i=0;$i<$l;$i++)
{
  $sug2[$i]=$ds[$i];
  //echo $sug2[$i].' <br>';
}
// probability matching
/*
$q2 = "SELECT Disease FROM symptoms WHERE prob = '$p'";
$k=0;
//echo $q2.'<br>';
if($re2 = $con->query($q2))
{
      if ($row=$re2->fetch_assoc())
      {
          do
          {
              $d1 = $row["Disease"];
              $dq[$k] = $d1;
              $k++;
              //echo $row["Disease"].' ';
          }while($row=$re2->fetch_assoc());
      }
}
for($i=0;$i<$k;$i++)
{
    //$sug2[$i]=$ds[$i];
  //echo $dq[$i].' <br>';
}*/
// finding min difference probability
$q3 = "SELECT * FROM symptoms";
$k=0;
//echo $q3.'<br>';
if($re3 = $con->query($q3))
{
      if ($row=$re3->fetch_assoc())
      {
          do
          {
              $d1 = $row["Disease"];
              $p1 = $row["prob"];
              $diff[$k] = abs($p-$p1);
              $dp[$k] = $d1;
              $prob[$k] = $p1;
              $k++;
          }while($row=$re3->fetch_assoc());

          //echo '<br>';
          function cf( $x, $y)
	        {
		          if ($x== $y)
			           return 0;
		          if ($x < $y)
			           return -1;
		          else
			           return 1;
	        }
          usort($diff,"cf");
          //echo ''.(min($diff));
          //echo '<br>';
          $h=0;
          do{
          for($i=0;$i<$k;$i++)
          {
            if($diff[$h] == abs($p- $prob[$i])) // if there is min difference
            {
              //$extra = $dp[$i];
              for($x=0;$x<$l;$x++)
              {
                if($sug2[$x]==$dp[$i])
                {
                    $suggestion = $dp[$i];
                    //echo $h;
                    break;
                }
                /*else                            // if min diiff didnt match, consider match prob
                {
                    for($t=0;$t<sizeof($dq);$t++)
                    {
                    if($sug2[$y] == $dq[$j])
                    {
                        $suggestion = $sug2[$y];
                    }
                    }
                }*/

              }
              if($suggestion)
                break;
            }
          }
          if($suggestion)
              break;
          $h=$h+1;
        }while($h<$k);

      }
}
if($p==0)
{
  $suggestion='Sorry, We are unable to find your disease becuase you didnt observed any of the mentioned Symptoms';
}
//else  // if there is no probability match then it has to take the sug2 first disease


/*for($x=0;$x<$l;$x++)
{
  for($t=0;$t<sizeof($dp);$t++)
  {
    if($sug2[$i] == $dp[$j])
    {
      $suggestion = $sug2[$i];
    }
  }
}*/


?>