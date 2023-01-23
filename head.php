<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" >
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script>
        window.onload=function(){
            // var today1 = new Date().toISOString().split('T')[0];
            // document.getElementsByName("datepick")[0].setAttribute("min", today1);

            const select = document.getElementById("reason");
            // document.getElementById("advice").style.width = '50%';
            var advice  = document.getElementById("advice")
            advice.style.width = '50%';
            select.addEventListener('change', function handlechange(event){
                if(event.target.value == "Childhood Vaccination Shots"){
                    advice.innerHTML ="Disclaimer! <br> Multiple vaccines are normally administered in combination and may cause the child to be sluggish or feverous for 24 to 48 hours afterwards.";
                }
                if(event.target.value == "Influenza Shot"){
                    advice.innerHTML = "The best time to get vaccinated is in April and May each year for optimal protection over the winter months.  ";
                }
                if(event.target.value == "Covid Booster Shot"){
                    advice.innerHTML ="Advice that everyone should arrange to have their third shot as soon as possible and adults over the age of 30 should have their fourth shot to protect against new variant strains.  ";
                }
                if(event.target.value == "Blood Test"){
                    advice.innerHTML="Some tests require some fasting ahead of time and that a staff member will advise them on this prior to the appointment. ";
                }
                if(event.target.value != null){
                    document.getElementById("Advice_h").innerHTML= "Advice (follow before taking the shot)";
                    advice.style.backgroundColor="hsl(50, 86%, 75%)";
                    advice.style.color= "hsl(200, 100%, 32%)";
                    advice.style.padding = "1%";
                    advice.style.borderRadius = "12px";
                }
            })
        }
        //activate for client side verification of time
        // function handleData()
        // {
        //     var form_data = new FormData(document.querySelector("form"));

        //     if(!form_data.has("time[]"))
        //     {
        //         document.getElementById("Alert").style.color = 'blue';
        //         document.getElementById("Alert").style.backgroundColor = 'red';
        //         document.getElementById("Alert").style.width = '50%';
        //         document.getElementById("Alert").style.padding = '1%';
        //         document.getElementById("Alert").innerHTML= "Please check atlest one of the availablity boxes";

        //         return false;
        //     }
        //     else
        //     {
        //     return true;
        //     }

        // }
        function handleId(){
            const name = document.getElementById("firstn").value;
            const f2 = name.substring(0,2);
            const l1 = name.slice(-1);
            const mI = name.substring(2, name.length-1);
            const num = parseInt(mI);

            // console.log(num);
            // console.log(f2);
            // console.log(l1);
            if(!(f2.match(/^[a-zA-Z]+$/)) || !(l1.match(/^[a-zA-Z]+$/)) || (mI.match(/^[0-9]+$/) == null)){
                document.getElementById("error").innerHTML= "ID invalid";
                // document.getElementById("firstn").value="";

            }
            if((f2.match(/^[a-zA-Z]+$/)) && (l1.match(/^[a-zA-Z]+$/))&&(mI.match(/^[0-9]+$/) != null)){
                document.getElementById("error").innerHTML="";
                var value = num,
                sum = 0;
                while (value) {
                    sum += value % 10;
                    value = Math.floor(value / 10);
                }
                var mod =parseInt(sum%26);


                console.log(mod);
                console.log(numToAlpha(mod));
                var r = l1.toString();
                r = r.toUpperCase();
                if (numToAlpha(mod)!=r){
                    document.getElementById("error").innerHTML="ID invalid";
                    // document.getElementById("firstn").value=name;
                }
                if(numToAlpha(mod)==r){
                    document.getElementById("error").innerHTML="";
                }

            }    
            function numToAlpha(int){
                if(int==0){return "Z";}
                if(int==1){return "A";}
                if(int==2){return "B";}
                if(int==3){return "C";}
                if(int==4){return "D";}
                if(int==5){return "E";}
                if(int==6){return "F";}
                if(int==7){return "G";}
                if(int==8){return "H";}
                if(int==9){return "I";}
                if(int==10){return "J";}
                if(int==11){return "K";}
                if(int==12){return "L";}
                if(int==13){return "M";}
                if(int==14){return "N";}
                if(int==15){return "O";}
                if(int==16){return "P";}
                if(int==17){return "Q";}
                if(int==18){return "R";}
                if(int==19){return "S";}
                if(int==20){return "T";}
                if(int==21){return "U";}
                if(int==22){return "V";}
                if(int==23){return "W";}
                if(int==24){return "X";}
                if(int==25){return "Y";}
            }           
        }
        
            function remember() {
                if(typeof(Storage)!=="undefined") {
                    if (document.getElementById("rem").checked) {
                        localStorage.setItem("username",document.getElementById("username").value);
                        localStorage.setItem("password",document.getElementById("password").value);
                        localStorage.setItem("rem",true);
                    }
                    else {
                        localStorage.clear();
                    }
                } else {
                    document.getElementById("error").innerHTML="The web browser does not support web storage API."
                }
            }
            function init() {
                if(typeof(Storage)!=="undefined") {
                    if (localStorage.getItem("rem")){
                        document.getElementById("username").value=localStorage.getItem("username");
                        document.getElementById("password").value=localStorage.getItem("password");
                        document.getElementById("rem").checked=true;
                    }                   
                } else {
                    document.getElementById("error").innerHTML="The web browser does not support web storage API."
                }
            }

            
    </script>

    <title>Assignment 2</title>
</head>