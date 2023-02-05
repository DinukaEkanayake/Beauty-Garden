
function getPaymentinput(){

    var paymentOption = document.forms['paymentForm']['paymentinfo'].value;
    const span = document.getElementById('payment-part-nameoncard-label');
    

    if(paymentOption){

        if(paymentOption == 'Cash-on-delivery'){

            document.getElementById('payment-part-cardtype-label').innerHTML = ""; 
            document.getElementById('payment-part-cardtype').innerHTML = "";
            document.getElementById('payment-part-nameoncard-label').innerHTML = "";
            document.getElementById('payment-part-nameoncard-input').innerHTML = "";
            document.getElementById('payment-part-cardno-label').innerHTML = "";
            document.getElementById('payment-part-cardno-input').innerHTML = "";
            document.getElementById('payment-part-expiremonth-label').innerHTML = "";
            document.getElementById('payment-part-expiremonth-input').innerHTML = "";
            document.getElementById('payment-part-cvv-label').innerHTML = "";
            document.getElementById('payment-part-cvv-input').innerHTML = "";
           
        }else{
            
            document.getElementById('payment-part-cardtype-label').innerHTML = "<label for='paymentMode'>Card type </label>"; 
            document.getElementById('payment-part-cardtype').innerHTML = "<select name='paymentMode'><option value=''>--Please select a card type--</option><option value='visa'>Visa</option><option value='mastercard'>Mastercard</option></select><br><br>";
            document.getElementById('payment-part-nameoncard-label').innerHTML = "<label for='nameoncard'>Card holder name </label>";
            document.getElementById('payment-part-nameoncard-input').innerHTML = "<input name='nameoncard' type='text' placeholder='Card holder name'><br><br>";
            document.getElementById('payment-part-cardno-label').innerHTML = "<label for='cardno'>Card Number</label>";
            document.getElementById('payment-part-cardno-input').innerHTML = "<input name='cardno' type='text' placeholder='xxxx-xxxx-xxxx-xxxx'><br><br>";
            document.getElementById('payment-part-expiremonth-label').innerHTML = "<label for='expiremonth'>YY/MM</label>";
            document.getElementById('payment-part-expiremonth-input').innerHTML = "<input type='month' name='expiremonth' id='expiremonth' min='2023-01'> <br><br>";
            document.getElementById('payment-part-cvv-label').innerHTML = "<label for='cvv'>CVV</label>";
            document.getElementById('payment-part-cvv-input').innerHTML = "<input name='cvv' type='text' placeholder='xxx'>";
        }

    }
    
}