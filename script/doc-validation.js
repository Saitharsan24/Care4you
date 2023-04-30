const form=document.querySelector('#form')  //get the form
const docname=document.querySelector('#doc_name')              // get the input form user
const nic=document.querySelector('#nic')                       // get the input form user
const contant=document.querySelector('#contact_number')        // get the input form user
const email=document.querySelector('#email')                   // get the input form user
const SLMC=document.querySelector('#SLMC_number')              // get the input form user
const specialization=document.querySelector('#specialization') // get the input form user
const username=document.querySelector('#usename')              // get the input form user
const password=document.querySelector('#password')             // get the input form user
const cpassword=document.querySelector('#conformpassword')     // get the input form user


//to cheack whether submit event doing or not
form.addEventListener('submit',(e)=>{
     e.preventDefault() //to if error will come form will not submitted
     validateInput();   // call the validation function
 } )

 function validateInput(){
   const docnameval=docname.value.trim();
   const nicval=nic.value.trim();
   const contantval=nic.value.trim();
   const emailval=email.value.trim();
   const SLMCval=SLMC.value.trim();
   const specializationval=specialization.value.trim();
   const usernameval=username.value.trim();
   const passwordval=password.value.trim();
   const cpasswordval=cpassword.value.trim();

      if(docnameval===''){
         setError(docname,'Doctorname is require')
      }
      
      else{
         setSuccess(docname)
      }

      if(nicval===''){
         setError(nicval,'nic is require')
      }else{
         setSuccess(nic)
      }

      if(contantval===''){
         setError(contant,'Contanct number is require')
      }else{
         setSuccess(contant)
      }

      if(SLMCval===''){
         setError(SLMC,'SLMC number is require')
      }else{
         setSuccess(SLMC)
      }

      if(specializationval===''){
         setError(specialization,'specializatio is require')
      }else{
         setSuccess(specialization)
      }
       
      
      if(usernameval===''){
         setError(username,'Username is require')
      }else{
         setSuccess(username)
      }

      if(passwordval===''){
         setError(password,'Password is require')
      }else if(password.length>=4){
         setError(password,'Password must be atleat 4 charactors')
      }else{
         setError(password)
      }
       
      if(cpasswordval===''){
         setError(cpassword,'Username is require')
      }else if(cpasswordval!==passwordval){
         setError(cpassword,'Password does not match')
      }else{
         setSuccess(cpassword)
      }  

 }

 function setError(element,message){
    const parent=element.parentElement;   // parent element of the what we get the element
    const errorElement= patent.querySelector('.error_1');

    errorElement.innerText=message;
    patent.classList.add('error_1')
    patent.classList.remove('success_1')
   }

   function setSuccess(element){
    const parent=element.parentElement;   // parent element of the what we get the element
    const errorElement= patent.querySelector('.error_1');

    errorElement.innerText='';
    patent.classList.add('success_1')
    patent.classList.remove('error_1')
   }

   const validateEmail =(email)=> {
      return String(email)
      .toLowerCase()
      .match(
       /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
      );
   };
