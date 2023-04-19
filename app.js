const btn=document.getElementById('button-submit');
btn.addEventListener('click', function() {
    let email = document.getElementById("email");

    console.log(email.value);
    
    fetch("fetch.php?email="+email.value,
    {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          data: email.value
        }),
        mode: 'cors',
        credentials: 'same-origin'
      }).then(res => {
        return res.json();
      }).then(data => {
        alert(data);
        console.log(data);
      });
});