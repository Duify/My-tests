<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои тесты</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="styleregister.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <style> 
      input.parsley-success,
       select.parsley-success,
       textarea.parsley-success {
         color: black;
         background-color: #DFF0D8;
       }

       input.parsley-error,
       select.parsley-error,
       textarea.parsley-error {
         background-color:rgb(221, 215, 250);
       }
       .parsley-errors-list {
        text-align:left;
        position:relative;
        top:7px;
        left:75px;
         margin: 0px 0 0px;
         padding: 0;
         list-style-type: none;
         font-size: 0.9em;
         line-height: 0.0em;
         opacity: 0;

         transition: all .3s ease-in;
         -o-transition: all .3s ease-in;
         -moz-transition: all .3s ease-in;
         -webkit-transition: all .3s ease-in;
       }

       .parsley-errors-list.filled {
         opacity: 1;
       }
       </style> 
</head>
<body>
<div class="bg">
    </div>
    <h2> Добро пожаловать </h2>
    <h3> Это страница администратора </h3>
    <div class="contwithlogo">

        <div class="logo">
            <img src="logo.png">
        </div>
        
        <div class="container">
            <p> Зарегистрировать</p>
            <div class="switch">
                <div class="login" onclick="tab1();">Студента</div>
                <div class="signup" onclick="tab2();">Преподавателя</div>
            </div>
            <div class="outer">

            <div id="forma">

            <div id="page1">
            <form  method="post">
            <label ><b>Логин</b></label>
            <div class="element">
            <input type="text" placeholder="Введите ваш логин" name="" >
            </div>
            <label ><b>Пароль</b></label>
            <div class="element">
            <input type="password" placeholder="Введите пароль" name="" >
            </div>
            <button type="submit">Войти</button>
            <label>
              <input type="checkbox" checked="checked" name="remember"> Запомнить меня
            </label>
            </form>
            </div>

            <div id="page1">
             <form method="post" id="admin_register_form" >
            <label ><b>Ваше имя</b></label>
            <div class="element">
            <input type="text" placeholder="Введите ваше имя" name="admin_name" id="admin_name" data-parsley-required-message="Пожалуйста, введите имя">
             </div>

             <label ><b>Ваша фамилия</b></label>
            <div class="element">
            <input type="text" placeholder="Введите вашу фамилию" name="admin_fam" id="admin_fam" data-parsley-required-message="Пожалуйста, введите фамилию">
             </div>

             <label><b>Ваше отчество</b></label>
            <div class="element">
            <input type="text" placeholder="Введите ваше отчество" name="admin_otch" id="admin_otch" data-parsley-required-message="Пожалуйста, введите отчество">
             </div>
             
            <label><b>Почта</b></label>
            <div class="element"> 
            <input type="text" placeholder="Введите вашу электронную почту" name="admin_email_address" id="admin_email_address" 
            data-parsley-trigger="focusout"data-parsley-checkemail data-parsley-checkemail-message='Данная почта уже используется' data-parsley-required-message="Пожалуйста, введите электронную почту" data-parsley-type-message="Это не почта, а просто буковки какие-то">
            </div>

            <label ><b>Пароль</b></label>
            <div class="element"> 
            <input type="password" placeholder="Введите пароль" name="admin_password" id="admin_password"  data-parsley-required-message="Пожалуйста, введите пароль"  >
            </div>

           <div class="element">
                <input type="hidden" name="page" value="register">
                <input type="hidden" name="action" value="register">
                
            </div> 
            
           <input type="submit" name="admin_register" id="admin_register" class="button" value="Зарегистрировать"> 
        </form>
        <div class="message" id="message"></div>
            </div>
        </div>
        </div>
    </div> 
</div>
</body>
</html>
<script>
    $(document).ready(function(){

window.ParsleyValidator.addValidator('checkemail', {
validateString: function(value)
{
  return $.ajax({
    url:"ajax_action.php",
    method:"POST",
    data:{page:'register', action:'check_email', email:value},
    dataType:"json",
    async: false,
    success:function(data)
    {
      return true;
    }
  });
}
});

$('#admin_register_form').parsley();

$('#admin_register_form').on('submit', function(event){

event.preventDefault();

$('#admin_email_address').attr('required','required');

            $('#admin_email_address').attr('data-parsley-type','email');

            $('#admin_password').attr('required','required');

            $('#admin_fam').attr('required','required');

            $('#admin_name').attr('required','required');

            $('#admin_otch').attr('required','required');

if($('#admin_register_form').parsley().isValid())
{
  $.ajax({
    url:"ajax_action.php",
    method:"POST",
    data:$(this).serialize(),
    dataType:"json",
    beforeSend:function(){
      $('#admin_register').attr('disabled', 'disabled');
      $('#admin_register').val('Секундочку...');
    },
    success:function(data)
    {
      if(data.success)
      {
        $('#message').html('<p>Пользователь успешно зарегистрирован ! Код подтверждения выслан на почту.</p>');
        $('#admin_register_form')[0].reset();
        $('#admin_register_form').parsley().reset();
      }

      $('#admin_register').attr('disabled', false);
      $('#admin_register').val('Зарегистрировать');
    }
  });
}

});

});





        const login = document.querySelector(".login");
        const signup = document.querySelector(".signup");
        const forma = document.querySelector("#forma");
        const switchs = document.querySelectorAll(".switch");

        let current=1;

        function tab2(){
            forma.style.marginLeft = "-100%";
            switchs[current-1].classList.add("active");
        }
        function tab1(){
            forma.style.marginLeft = "0";
            switchs[current-1].classList.remove("active");
        }
</script>