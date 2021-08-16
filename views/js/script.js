function sendMail(params){
    var tempParams={
        from_name:document.getElementById("fromName").value,
        to_name:document.getElementById("toName").value,
        message:document.getElementById("msg").value,
    };
    emailjs.send('service_c6ye5b4','template_lfmow9l',tempParams)
    .then(function(res){
        console.log("success",res.status)
    })
  }