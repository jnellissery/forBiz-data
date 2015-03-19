<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Emily</title>


<link href="css/stylesM.css" rel="stylesheet" type="text/css" /> 
<link href="css/style_new.css" rel="stylesheet" type="text/css" />
<link href="css/stylesM.css" rel="stylesheet" type="text/css" /> 
<link href="css/bg_stretch.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="admin/css/fonts/ptsans/stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>  
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bgstretcher.js"></script>
<script src="js/jquery.ez-bg-resize.js" type="text/javascript" charset="utf-8"></script>
<style>
	#CartModel
	{
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
	}

</style>

<!--/*
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script> */-->

<script type="text/javascript">
jQuery(document).ready(function() { 
var str=""
var str1=""		
str1='<table style="width:100%;padding-top:10px;"><tr><td align="left" colspan="2" style="height:25px;"> <img src="images/kk.png"  width="400px" height="800px"></td></tr><br /><br /><tr><tr> <td style="text-align:right">  Name &nbsp; &nbsp;:</td><td style="text-align:LEFT">&nbsp;&nbsp;<input type="text" name="txt_name1" id="txt_name1" class="rounded ' 
str1+=' required"  style="width:150px;height:25px">  </td></tr><tr> <td style="text-align:right">    Place   &nbsp; &nbsp;:</td> <td style="text-align:LEFT">&nbsp;&nbsp;<input type="text" name="txt_place"'
str1+=' id="txt_place" class="rounded required"  style="width:150px;height:25px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#"  class="emily_buttons" id="img1" >No Thanks,Proceed to Emily Site</a> </td></tr><tr><td style="text-align:right">  Email  &nbsp; &nbsp;:</td> <td style="text-align:LEFT"> &nbsp;&nbsp;<input'
str1+=' type="text" name="txt_email1" id="txt_email1" class="rounded required" style="width:150px;height:25px" > </td></tr><tr><td style="text-align:right">'
str1+='MOB NO  &nbsp; &nbsp;:</td> <td  style="text-align:LEFT"> &nbsp;&nbsp;<input type="text" name="txt_mobile" id="txt_mobile" class="rounded required" style="width:150px;height:25px" > </td></tr>'
str1+='<tr><td colspan="2"  style="text-align:left; padding-left:130px"'  
str1+=' ><a href="#"  class="emily_buttons" onclick= malaya_reg("M") >Submit Interest</a></td></tr><tr><td align="right" colspan="2"  id="enquiry_status1"></td></tr></table>'
  	
		str+="<div id='maindiv' style='border:2px solid orange;margin:20px;height:600px;overflow-y:scroll;'><img src='images/Emily 1-page-001.jpg' alt='EMILY(Levonorgestrel releasing Intrauterine System)'><img src='images/Emily 1-page-002.jpg' alt='EMILY(Levonorgestrel releasing Intrauterine System)'>"
		$('#CartModel').html( str + "<br />"+str1 + "/div>" ).modal('show');
		$('#img1').bind('click',function(){$('#CartModel').modal('hide')});
	
	$('#CartModel').on('hidden', function () 
		{
  			window.location.href="http://www.emily.org.in/"
		})
		$('#spannotinterested').bind('click',function(){$('#CartModel').modal('hide')});
		
				var offset = 220;

				var duration = 500;

				jQuery(window).scroll(function() {

					if (jQuery(this).scrollTop() > offset) {

						jQuery('.back-to-top').fadeIn(duration);

						jQuery('#little_menu').fadeIn(duration);

					} else {

						jQuery('.back-to-top').fadeOut(duration);

						jQuery('#little_menu').fadeOut(duration);

					}

				});

				

				jQuery('.back-to-top').click(function(event) {

					event.preventDefault();

					jQuery('html, body').animate({scrollTop: 0}, duration);

					return false;

				})

			});

	





	$(document).ready(function(){

	

        //  Initialize Backgound Stretcher	 
		$('#trage').hide();  

		
		

		$(document).bind('click', function(e) {

			var $clicked = $(e.target);

			

			if ($clicked.parents().attr("id")=="top"){

					$('#interest_form').hide('slow');

					$('#login_form').hide('slow');

				}

			});

		

	});

	
 
	

</script>



<script>           		

function malaya_reg(cat)
	{
	var name = $('#txt_name1').val();
	var mobile=$('#txt_mobile').val();
	var age =0; 	
	var address =''; 
	var phone = $('#txt_mobile').val(); 
	var place =$('#txt_place').val(); 	
	var email =$('#txt_email1').val(); 	
	var state=''; 
	var flag = 0;
	var symptoms='';
	var FR_MALA='MALAYALAMANORAMA';
	var type=cat;
	
 
	if (type=='N')
	{
		name="Not Interested: Malayala Manorama";
		email="Email"
		phone="mobile"
	}
				if(name=="")
				{
				document.getElementById('txt_name1').style.borderColor="#FF0000";
				flag = 1;
				}
				else
				{
				
			 		if($('#txt_name1').val()!=undefined)
					 {
						document.getElementById('txt_name1').style.borderColor="";
					 }
					
					
				}
				
				if(mobile=="")
				{
				document.getElementById('txt_mobile').style.borderColor="#FF0000";
				flag = 1;
				}
				else
				{
					 if($('#txt_mobile').val()!=undefined)
					 {
						document.getElementById('txt_mobile').style.borderColor="";
					 }
				}
				if(email=="")
				{
				document.getElementById('txt_email1').style.borderColor="#FF0000";
				flag = 1;
				}
				else
				{
					if($('#txt_mobile').val()!=undefined)
					{
					document.getElementById('txt_email1').style.borderColor="";
					}
				}
				
					if(flag==1)
					{
					
					document.getElementById('enquiry_status1').innerHTML=" <b style='color:#FF0000;'>Please check the highlighted fields</b>";
					
					}
					
					else
					{
					
				 if($('#enquiry_status1').val()!=undefined)
				 {
						document.getElementById('enquiry_status1').innerHTML=" Submitting...";
			 	}
					$.ajax({	
					
					url : "http://www.emily.org.in/emily_enquiry",	
					
					type : "POST",	
					
					data : 'name='+name+'&address='+address+'&phone='+phone+'&email='+email+'&state='+place+'&age='+age+'&symptoms='+symptoms+'&type='+type+'&FR_MALA='+FR_MALA,
					
						success : function(data)
						 {   
						
						 
							if(data == 'SUCCESS')					
							
							{				
							//alert("jkk");
							document.getElementById('enquiry_status1').innerHTML=" Thank you for your interest in our product! We will get in touch with you soon";
							$('#CartModel').remove();
							window.location.href="http://www.emily.org.in/"
							}
							
							else					
							
							{				
							
							document.getElementById('enquiry_status1').innerHTML=" Sorry!!! Try again later...";
							}									
						
						}, 
						error : function(XMLHttpRequest, textStatus, errorThrown) 
			{
			alert(XMLHttpRequest.responseText);
			
			},
						async:   false			
					
					});	
		
					}
	
	}

function submit_registration()	{

	var type = $('input:radio[name="interest_type"]:checked').val();     

	

	 if(type=="doctor"){

		 var who = 'D';

	 }

	 else if(type=="patient"){

		  var who = 'P';

	 }

	

	var name = $('#txt_name').val();

	var age = $('#txt_age').val(); 	

	var address = $('#txt_address').val(); 

	var phone = $('#txt_contact').val(); 	

	var email = $('#txt_email').val(); 	

	var state=$('#sel_state').val(); 

	var symptoms=$('#txt_symptoms_mrn').val();

	var flag = 0;

	

	if(document.getElementById('txt_name').value==""){

		document.getElementById('txt_name').style.borderColor="#FF0000";

		flag = 1;

	}

	else{

		document.getElementById('txt_name').style.borderColor="";

	}

	

	

	if(document.getElementById('txt_age').value==""){

		document.getElementById('txt_age').style.borderColor="#FF0000";

		flag = 1;

	}

	else{

		document.getElementById('txt_age').style.borderColor="";

	}

	

	

	if(document.getElementById('txt_address').value==""){

		document.getElementById('txt_address').style.borderColor="#FF0000";

		flag = 1;

	}

	else{

		document.getElementById('txt_address').style.borderColor="";

	}

	

	if(document.getElementById('txt_contact').value==""){

		document.getElementById('txt_contact').style.borderColor="#FF0000";

		flag = 1;

	}

	else{

		document.getElementById('txt_contact').style.borderColor="";

	}

	

	

	if(document.getElementById('txt_email').value==""){

		document.getElementById('txt_email').style.borderColor="#FF0000";

		flag = 1;

	}

	else{

		document.getElementById('txt_email').style.borderColor="";

	}

	

	

	if(document.getElementById('sel_state').value==""){

		document.getElementById('sel_state').style.borderColor="#FF0000";

		flag = 1;

	}

	else{

		document.getElementById('sel_state').style.borderColor="";

	}

	

	

	if(flag==1){

		document.getElementById('enquiry_status').innerHTML=" <b style='color:#FF0000;'>Please check the highlighted fields</b>";

	}

	else{

	document.getElementById('enquiry_status').innerHTML=" Submitting...";

	document.patient_doctor_form.reset();

	$.ajax( {	

		url : "http://localhost/emily/emily/emily_enquiry",	

		type : "POST",	

		 data : 'name='+name+'&address='+address+'&phone='+phone+'&email='+email+'&state='+state+'&age='+age+'&symptoms='+symptoms+'&type='+who,

		success : function(data) {   

			if(data == 'SUCCESS')					

			{				

				document.getElementById('enquiry_status').innerHTML=" Thank you for your interest in our product! We will get in touch with you soon";

			}

			else					

			{				

			   document.getElementById('enquiry_status').innerHTML=" Sorry!!! Try again later...";



			}									

		}, async:   false			

	});	

	

	}

}



function submit_login(action, method, values) {

    var form = $('<form/>', {

        action: action,

        method: method

    });

    $.each(values, function() {

        form.append($('<input/>', {

            type: 'hidden',

            name: this.name,

            value: this.value

        }));    

    });

    form.appendTo('body').submit();

}





function login_check(){

	   var type = $('input:radio[name="login_as"]:checked').val();

	   var user = $('#username').val();

	   var pass = $('#password').val();

	   

	   if(user=="" || pass==""){

		   document.getElementById('login_status').innerHTML=" <b style='color:#FF0000;'>Please check the highlighted fields</b>";

		 	return;  

	   }

	   else{

		   document.getElementById('login_status').innerHTML=" Validating...";

	   }

	   

	   if(type=="doctor"){

		   submit_login("<?php echo base_url();?>"+'/login/doctor', 'POST', [

				{ name: 'txt_doc_email', value: user },

				{ name: 'txt_doc_pass', value: pass }

			]);

	   }

	   else if(type=="patient"){
alert();
		    submit_login("<?php echo base_url();?>"+'/login/patient', 'POST', [

				{ name: 'txt_pat_user', value: user },

				{ name: 'txt_pat_pass', value: pass }

			]);

	   }

   }

</script>







</head>



<body>
 
<div  id="CartModel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true"  align="center"    style="width:800px; height:auto;overflow:hidden;  top: 0%; text-align: center;background-color:#9966FF; ">
    </div>
  
        
      <div style="font-family:ML-TTKarthika">AanXcà{kmhw</div>
    

<div id="little_menu" style="display:none">
	<a href="#top" title="Home" class="scroll" ><img src="images/home.png"></a>
	<a href="#about" title="About Emily" class="scroll" title="About Emily"><img src="images/about_emily.png"></a>
	<a href="#faq" title="FAQ" class="scroll" ><img src="images/home_faq.png"/></a>
	<a href="#hll" title="HLL R&D" class="scroll"><img src="images/hll_new.png"></a>
	<a href="#news" title="News" class="scroll"><img src="images/news_new.png"></a>
	<a href="#address" title="Contact" class="scroll"><img src="images/contact.png"></a>
</div>

<div id="top" style="height:850px !important;">

		<div id="logo">
			<img src="images/logo_emily_new.png" alt="EMILY(Levonorgestrel releasing Intrauterine System)" width="330">
		</div>

		<div id="menu">
          
			<a href="#concept" class="scroll">HOME</a>

			<span class="round">•</span>

			<a href="#about" class="scroll">ABOUT EMILY</a>

			<span class="round">•</span>

            <a href="#faq" class="scroll">FAQ's</a>

            <span class="round">•</span>

			<a href="#hll" class="scroll">HLL R&amp;D</a>

			<span class="round">•</span>

			<a href="#news" class="scroll">NEWS</a>

            <span class="round">•</span>

			<a href="#address" class="scroll">CONTACT</a>

	</div>
	<div id="scrolldown">
	<img src="img/scrolldown.png" alt="Scroll down">
	</div>
        <div id="holder_div">
        <div id="interest_box">

	<div>
		<a href="javascript:;" id="interest_box_close" onclick="interest_box_show()"  >I am interested! </a>
	</div> 

            <div id="interest_form" style="display:none">

            <form id="patient_doctor_form" name="patient_doctor_form" method="post">

                    <table width="360" border="0" >  

                    

                    <tbody>

                      <tr>

                        <td align="left">&nbsp;</td>

                        <td>&nbsp;</td>

                      </tr>

                    <tr>   

                    <td align="left">I am interested</td>  

                    <td>

                    <input type="radio" id="interest_type" name="interest_type" value="doctor" onclick="change_field_label(this.value)" checked="checked" /> I am a Doctor &nbsp;&nbsp;

                    <input type="radio" id="interest_type" name="interest_type" value="patient" onclick="change_field_label(this.value)" /> I am a Patient

                    </td> 

                    </tr>

                    <tr>   

                    <td width="108" align="left">Name</td>  

                    <td width="205"><input type="text" name="txt_name" id="txt_name" class="rounded required"  > </td> 

                    </tr>  

                 <tr id='trage'>  

                    <td align="left">Age</td>   

                    <td><input type="text" name="txt_age" id="txt_age" class="rounded required digits"> </td> 

                    </tr> 

                    <tr>

                    <td align="left" id="show_required_field_label">Medical Registration Number</td> 

                    <td>       

                    <textarea name="txt_symptoms_mrn" class="rounded" id="txt_symptoms_mrn"></textarea>        </td>  

                    </tr>

                    

                    

                    <tr>   

                    <td align="left">Address</td>  

                    <td><input type="text" name="txt_address" id="txt_address" class="rounded required"> </td>

                    </tr>  <tr>   

                    <td align="left">State</td>  

                    <td> <select class="required" name="sel_state" id="sel_state">

                    <option value="">Select State</option>

                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>

                    <option value="Andhra Pradesh">Andhra Pradesh</option>

                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>

                    <option value="Assam">Assam</option>

                    <option value="Bihar">Bihar</option>

                    <option value="Chhattisgarh">Chhattisgarh</option>

                    <option value="Dadra &amp; Nagar Haveli">Dadra &amp; Nagar Haveli</option>

                    <option value="Daman &amp; Diu">Daman &amp; Diu</option>

                    <option value="Delhi">Delhi</option>

                    <option value="Goa">Goa</option>

                    <option value="Gujarat">Gujarat</option>

                    <option value="Haryana">Haryana</option>

                    <option value="Himachal Pradesh">Himachal Pradesh</option>

                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>

                    <option value="Jharkhand">Jharkhand</option>

                    <option value="Karnataka">Karnataka</option>

                    <option value="Kerala">Kerala</option>

                    <option value="Lakshadweep">Lakshadweep</option>

                    <option value="Madhya Pradesh">Madhya Pradesh</option>

                    <option value="Maharashtra">Maharashtra</option>

                    <option value="Manipur">Manipur</option>

                    <option value="Meghalaya">Meghalaya</option>

                    <option value="Mizoram">Mizoram</option>

                    <option value="Nagaland">Nagaland</option>

                    <option value="Orissa">Orissa</option>

                    <option value="Pondicherry">Pondicherry</option>

                    <option value="Punjab">Punjab</option>

                    <option value="Rajasthan">Rajasthan</option>

                    <option value="Sikkim">Sikkim</option>

                    <option value="Tamil Nadu">Tamil Nadu</option>

                    <option value="Tripura">Tripura</option>

                    <option value="Uttar Pradesh">Uttar Pradesh</option>

                    <option value="Uttarakhand">Uttarakhand</option>

                    <option value="West Bengal">West Bengal</option>

                    </select>

                    </td>

                    </tr><tr> 

                    <td align="left">Mobile Number</td>   

                    <td><input type="text" name="txt_contact" id="txt_contact" class="rounded required digits" > </td>  </tr>  

                    <tr>  

                    <td align="left">Email</td> 

                    <td><input type="text" name="txt_email" id="txt_email" class="rounded required email"></td>  </tr>

                     

                    <tr>   

                    <td colspan="2" align="right" style="padding-top:20px;">

                     <a href="javascript:;" class="emily_buttons" onclick="submit_registration()">Submit Interest</a>

                     </td>  

                     </tr>

                    <tr>    <td>&nbsp;</td>    

                    <td><input type="hidden" id="email_availablity" class="required email" value="" name="email_availablity">

                    </td>  

                    </tr>

                    <tr>

                    	<td colspan="2" id="enquiry_status" align="right">&nbsp;</td>

                    </tr>

                    </tbody>

                    </table>

            </form>

            </div>

        </div>
         <div id="patient_interest_box">

           

			<div>

                <a href="javascript:;" id="patient_interest_box_close" onclick="login_box_show()">Login</a>

            </div> 

            <div id="login_form" style="display:none">

            <form id="patient_doctor_login" name="patient_doctor_login" method="post">

                    <table width="360" border="0" >  

                    

                    <tbody>

                    <tr>

                        <td align="left">&nbsp;</td>

                        <td>&nbsp;</td>

                    </tr>

                    <tr>   

                    <td align="left">Login as</td>  

                    <td>

                    <input type="radio" id="login_as" name="login_as" value="doctor" checked="checked" /> Doctor &nbsp;&nbsp;

                    <input type="radio" id="login_as" name="login_as" value="patient" /> Patient

                    </td> 

                    </tr>

                    <tr>   

                    <td width="108" align="left">Username</td>  

                    <td width="205"><input type="text" name="username" id="username" class="rounded required"  > </td> 

                    </tr>  <tr>  

                    <td align="left">Password</td>   

                    <td><input type="password" name="password" id="password" class="rounded required digits"> </td> 

                    </tr> 

                    <tr>  

                    <td colspan="2" align="right" style="padding-top:20px;">

                    	<a href="javascript:;" class="emily_buttons" onclick="login_check()">Login Now</a>

                    </td>  

                    </tr>

                    <tr>

                    	<td colspan="2" id="login_status" align="right" height="40">&nbsp;</td>

                    </tr>

                    </tbody>

                    </table>

            </form>

            </div>
<br />
        </div>
        </div>
	</div>

    

    <div id="about">

        <div id="about_content">

        <h1>EMILY(Levonorgestrel releasing Intrauterine System)</h1>

        <p>BRIEF PRESCRIBING INFORMATION</p>

        This information does not   include all details needed to use Emily safely and effectively. See full   prescribing information for Emily.

        Emily (Levonorgestrel releasing Intrauterine System)

        Approval date (India): 2011

        <p>INDICATIONS</p>

        Emily is a sterile, Levonorgestrel releasing Intrauterine System indicated for: 

            <ul>

                <li>Intrauterine contraception for up to 3 years, in women who have at least one child.</li>

                <li>Treatment of heavy menstrual bleeding for   women who suffer from dysfunctional uterine bleeding and who are willing   to accept LNG IUD as an alternative to hysterectomy or oral   medications.</li>

                </ul>

                <p>DOSAGE AND ADMINISTRATION</p>

                <ul>

                <li>Release rate of Levonorgestrel is approximately 20 µg per day; Emily should be replaced after 3 years. </li>

                <li>To be inserted by a trained healthcare   provider using strict aseptic technique. Healthcare providers are   advised to become thoroughly familiar with the insertion instructions   before attempting insertion.</li>

                <li>Patient should be re-examined and monitored 4 to 12 weeks after insertion; then, yearly or more often if indicated. </li>

            </ul>

            <p>DOSAGE FORMS AND STRENGTHS</p>

            One sterile Intrauterine System consisting of   M-shaped polyethylene frame with a steroid reservoir containing 52 mg   Levonorgestrel held within an inserter tube.

            <p>WARNINGS AND PRECAUTIONS</p>

            <ul>

                <li>If pregnancy occurs with Emily in place, remove Emily. </li>

                <li>Increased risk of ectopic pregnancy</li>

                <li>Group A streptococcal infection has been reported; strict aseptic technique is essential during insertion. </li>

                <li>Before using Emily, consider the risks of PID. </li>

                <li>Bleeding patterns become altered, may remain irregular and amenorrhea may ensue. </li>

                <li>Perforation may occur during insertion. Risk   is increased in women with fixed retroverted uteri, during lactation,   and postpartum. </li>

                <li>Embedment in the myometrium and partial or complete expulsion may occur. </li>

                <li>Persistent enlarged ovarian follicles should be evaluated</li>

            </ul>

        <p>ADVERSE REACTIONS</p>

        The most common adverse reactions reported in   clinical trials with a similar device (&gt; 10%users) are   uterine/vaginal bleeding alterations (51.9%), amenorrhea (23.9%),   intermenstrual bleeding and spotting (23.4%), abdominal/pelvic pain   (12.8%) and ovarian cysts (12%). 

        <p>DRUG INTERACTIONS</p>

        <ul>

         <li>Drugs or herbal products that induce certain enzymes, such as CYP3A4 may decrease the serum concentration of progestins.</li>

        </ul>

        <p>USE IN SPECIFIC POPULATIONS</p>

            <ul>

                <li>Small amounts of progestins pass into breast milk resulting in detectable Steroid levels in infant serum. </li>

                <li>Use of this product before menarche is not indicated. </li>

                <li>Use in women over 65 has not been studied and is not approved. </li>

            </ul>

        </div>

    </div>

    <div id="faq">

        <div id="inner_content">

        <h1>Frequently asked questions about EMILY</h1>

          <p>1. What is Emily (Levonorgestrel-releasing Intrauterine System)? How does Emily prevent pregnancy?</p>

          <div> EMILY is an intrauterine delivery system (IUS)   consisting of a small white M-shaped frame made from soft, flexible   plastic. The vertical arm is surrounded by a narrow cylindrical shaped   reservoir that contains Levonorgestrel which slowly releases into your   uterus. It prevents pregnancy and decrease the abnormally heavy   menstrual blood loss.<br />

            EMILY works by slowly releasing Levonorgestrel into the uterus at a rate of approximately 20 micrograms per day. 

            This amount of Levonorgestrel:

            <ul>

              <li>Reduces the normal monthly thickening of the lining of the uterus.</li>

              <li>Thickens the cervical mucus which prevents passage of sperm through the cervical canal (opening to the uterus).</li>

            </ul>

          </div>

          <p>2. Is Emily effective in treating Heavy Menstrual bleeding?</p>

          <div> Yes, Emily is effective in treating heavy menstrual bleeding (DUB) in globally.          </div>

          <p>3. Why should I prefer Emily?</p>

          <div>

            <ul>

              <li>Long term Contraception and effective treatment for DUB.</li>

              <li>Less systemic side effects like oral contraceptives.</li>

              <li>Easy insertion with less pain.</li>

              <li>Available at affordable cost.</li>

            </ul>

          </div>

          <p>4. Is it a difficult process to insert Emily?</p>

          <div> No, The insertion procedure usually takes a few   minutes after your doctor has completed the pelvic examination. You will   be protected from pregnancy as soon as insertion of the system is   complete; however, it is best to wait 24 to 48 hours before having   sexual intercourse. A reduction in menstrual blood loss should be   apparent from the first menstrual cycle.          </div>

          <p>5. Will my periods change with Emily?</p>

          <div> EMILY will affect your menstrual cycle. You might   experience frequent spotting (a small amount of blood loss) or light   bleeding in addition to your periods for the first 3 to 6 months. In   some cases, you may have heavy or prolonged bleeding during this time.            Overall, gradually, your menstrual period may   disappear when using EMILY. Due to the hormone&rsquo;s effect on the lining of   the uterus it&rsquo;s become thicken. Therefore there is little or no   bleeding, as happens during a usual menstrual period. But, when the   system is removed, periods should return to normal. Menstruation   disappearance does not necessarily mean you have reached menopause or   are pregnant. If, however, you are having regular menstrual periods and   then do not have one for 6 weeks or longer, it is possible that you may   be pregnant. You should consult with your doctor. </div>

          <p>6. Which are the conditions were Emily should not be used?</p>

          <div> EMILY is not suitable for every woman. Your   doctor can advise you if you have any conditions that would pose a risk   to you. You should not use EMILY if you: 

            <ul>

              <li>have any allergies to the hormone levonorgestrel, or to any of the other ingredients of EMILY, </li>

              <li>are pregnant, or if you suspect that you may be pregnant,</li>

              <li>Currently have pelvic inflammatory disease (PID) or have a recurrent PID </li>

              <li>had an infection of the uterus (womb)/cervix after delivering a baby or having abortion during the past 3 months</li>

              <li>have a condition of the uterus that distorts the uterine cavity, such as large fibroids </li>

              <li>have cell abnormalities in the cervix (your doctor can tell you if you have this)</li>

              <li>have a known or suspected progestogen-dependent tumour, including breast cancer</li>

              <li>have liver disease or liver tumor</li>

              <li>have bacterial endocarditis (an infection of the heart valves or lining of the heart)</li>

              <li>have immunodeficiency (a doctor will have told you if you have this)</li>

              <li>have cancer affecting the blood, or if you have leukemia</li>

              <li>have or have had trophoblastic disease (a doctor will have told you if you have this)</li>

              <li>have cancer of the uterus or the cervix (uterine or cervical malignancy. </li>

            </ul>

          </div>

          <p>7. Are there any potential serious complications and any side effects with Emily?</p>

          <div> Pelvic inflammatory disease (PID). Some IUD users   get a serious pelvic infection called pelvic inflammatory disease. PID   is usually sexually transmitted. You have a higher chance of getting PID   if you or your partner has sex with other partners. PID can cause   serious problems such as infertility, ectopic pregnancy or pelvic pain   that does not go away. PID is usually treated with antibiotics. More   serious cases of PID may require surgery. A hysterectomy (removal of the   uterus) is sometimes needed. In rare cases, infections that start as   PID can even cause death.

            Tell your healthcare provider right away if you   have any of these signs of PID: long-lasting or heavy bleeding, unusual   vaginal discharge, low abdominal (stomach area) pain, painful sex,   chills, or fever.            <br />

            <br />

            <em><u>Embedment</u></em> : Emily may become   attached to the uterine wall. This is called embedment. If embedment   happens, Emily may no longer prevent pregnancy and you may need surgery   to have it removed.            <em><u><br />

            <br />

            Perforation</u></em> : Emily may go through   the uterus. This is called perforation. If your uterus is perforated,   Emily may no longer prevent pregnancy. It may move outside the uterus   and can cause internal Scarring, infection, or damage to other organs,   and you may need surgery to have Emily removed.

            <p>Common Side Effects</p>

            <ul>

              <li>Abdominal pain, Back pain, Breast pain, </li>

              <li>Painful periods,</li>

              <li>Altered mood, Headache, </li>

              <li>Depression and Nervousness,</li>

              <li>Genital discharge, </li>

              <li>Vaginal hemorrhage,</li>

              <li>Withdrawal bleeding, </li>

              <li>Menorrhagia, </li>

              <li>Vaginal infection, </li>

              <li>Ovarian cyst</li>

              <li>Decreased sex drive,</li>

              <li>Weight increase,</li>

              <li>Nausea, </li>

              <li>Acne, </li>

              <li>Skin disorder </li>

            </ul>

          </div>

          <p>8. How often should I see my doctor once Emily is placed?</p>

          <div> You should have the system checked by your doctor   approximately 4 to 12 weeks after it is fitted, again at 12 months and   then once a year until it is removed. EMILY can stay in place for 3   years.          </div>

          <p>9. What should I do, if I wish to become pregnant?</p>

          <div> If you wish to become pregnant, ask your doctor   to remove EMILY. Your usual level of fertility should return soon after   the system is removed.          </div>

          <p>10. Will my partner be able to feel Emily during intercourse?</p>

          <div> During sexual intercourse, you or your partner   should not be able to feel EMILY. If you can feel EMILY, or any pain or   discomfort that you suspect may be caused by it, then you should not   have sexual intercourse until you consult your doctor to verify it is   still in the correct position.          </div>

          <p>11.	Will Emily protect from HIV or STDs (sexually transmitted diseases)?</p>

          <div> No. Emily (Levonorgestrel-releasing Intrauterine   System) does not protect against HIV or STDs. So, if while using Emily   you should think you or your partner is at a risk of getting an STD, use   a condom and call your healthcare provider.          </div>

        </div>

    </div>

    

    

    <div id="hll">

        <div id="inner_content">

        <h1>About HLL R&D</h1>

          <p class="subhead">HLL strives for excellence in innovation.</p>

          <div>

            <p>Through the interchange of creative, imaginative people, a global Research and Development (R&amp;D) centre that encourages collaboration and cooperation among highly reputed research centers in the country; and a strong commitment to ongoing investment, we have put R&amp;D at the centre of everything we do.</p>

            <p>From Blood Transfusion Bags to Hydrocephalus Shunts, once-a-week Non Steroidal Oral Contraceptive Pills and several variants of condoms, every product from HLL is a result of innovation.</p>

            <p>The last four decades have seen HLL network with various scientific and academic institutions of excellence for developing novel healthcare products. HLL has a state-of-the-art R&amp;D centre at Thiruvananthapuram in Kerala, India.</p>

          </div>

          <p>R &amp; D Centre, Thiruvananthapuram, Kerala</p>

          <div>

            <p>HLL's R&amp;D centre has several projects in hand, carried out in-house or on collaborative mode, with premier academic and research institutions in the country and abroad. These projects cover a wide area of research ranging from development of novel techniques for drug delivery to blood filters, novel contraceptives and cancer-care devices. Some of the institutions HLL has networked with are-Indian Institute of Technology (IIT), Kanpur; Central Drug Research Institute (CDRI), Lucknow; Sree Chitra Thirunal Institute of Medical Sciences &amp; Technology (SCTIMST), Thiruvananthapuram; Regional Cancer Centre (RCC), Thiruvananthapuram, and Population Council, USA.</p>

            <p>HLL has set up a Technology Business Incubation centre (TBlC) at Rajiv Gandhi centre for Biotechnology (RGCB), Thiruvananthapuram. The goal of the TBlC is to develop novel, fast and easy-to-use diagnostic methodologies for various infectious diseases. As part of this collaboration, HLL has developed a duplex kit for viral infections. This project would be extended to development of newer and less expensive diagnostic kits.</p>

            <p>Based on its technological competency, the R&amp;D centre is implementing sponsored projects from organisations including Department of Science and Technology (DST), Defense Research Development Organisation (DRDO), Department of Biotechnology (DBT), Council of Scientific Industrial Research (CSlR) and international agencies like Bill&amp; Melinda Gates Foundation.</p>

          </div>

          <a href="http://www.lifecarehll.com/" target="_blank" class="emily_buttons">Know more about HLL</a>

        </div>

        

       

        

        

    </div>

    

    

    

    <div id="news">

      <div id="inner_content">

        <h1>News & Press Release</h1>

        <p> HLL's R&amp;D division introduced 'Emily', a new Intra   Uterine hormonal System (IUS) for effective management of Dysfunctional   Uterine Bleeding (DUB) in Bengaluru on October18, 2012 </p>

        <p>DUB affects 22 to 30% of women and accounts for 12% of   gynaecological referrals. Within five years of referral, 20% of women   undergo hysterectomy, making it is the most common major gynaecological   operation. ‘Emily' works as a contraceptive option and also effectively   treats heavy and painful menstrual bleeding. The device is removable and   releases the hormone in a controlled way for a period of five years to   offer therapeutic action for contraception and against heavy menstrual   bleeding. The action of this device is reversible after removal,   allowing the user to become pregnant again.</p>

        <p>The last four decades have seen HLL network with various   scientific and academic institutions of excellence for developing novel   healthcare products. HLL has a state-of-the-art R&amp;D centre at   Thiruvananthapuram in Kerala, India.</p>

        <p> &quot;Emily substantiates HLL's motto of   'Quality Healthcare at affordable cost',&quot; said HLL C&amp;MD Dr. M.   Ayyappan. </p>

        </div>



    </div>

    

    

    

    <div id="address">

      <div id="inner_content">

        <h1>Contact Information</h1>

        <p style="margin:0">

             

                <iframe width="1000" scrolling="no" height="350" frameborder="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=HLL+Lifecare+Limited,+Akkulam,+Trivandrum&amp;ie=UTF8&amp;hq=HLL+Lifecare+Limited,+Akkulam,+Trivandrum&amp;ll=8.539591,76.908314&amp;spn=0.006295,0.006295&amp;t=m&amp;z=14&amp;output=embed" marginwidth="0" marginheight="0" style="border:1px solid #DEDEDE" class="mp4downloader_tagChecked "></iframe></p>

        <div class="contact-addresspart">
<div style="font-family:Arial, ML-TTKarthika">AanXcà{kmhw</div>
                	<div class="contact-address"><p>Corporate R &amp; D Centre<br>HLL Lifecare Limited<br>Akkulam<br>Trivandrum<br>Kerala -695017</p></div>

                 	<div class="contact-phone"><p><br>Phone : 04712774700<br>Email: <a href="#">emilylifecarehll@gmail.com</a></p></div>

               </div>

        </div>



    </div>

 
<a href="#" class="back-to-top"><img src="images/bottom_logo.png" border="0" /></a>   

  

</body>

 

</html>

