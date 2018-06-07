//Submission check

$("#submitButton").on('click', function () {


    event.preventDefault();

    var success;

    success = document.getElementsByClassName("text-success");

    if (success.length === 6) {
        //redirect the page to the success form
        var buttonList = $(".actions");

        setTimeout(function () {
            // Your code here
            buttonList.append("<li><input type=\"\" class='successful added' value=\"MESSAGE SENT!\"></li>");
        }, 300);

        //Stop the functions after 1 minute.
        setTimeout(function () {
            $(".added").fadeOut();

        }, 1500);
    }
    //if form tried to be submitted without values
    else {
        //if the form missing,
        $(".empty_form").html("Please fill the form!");
        sendInformation();


        setTimeout(function () {
            //wait
            // console.log("hey");
            $(".empty_form").html("");

        }, 2000);


    }
});


function sendInformation() {

//regex and value check
    $("#submitButton").on('click', function () {
        $.post('message.php',
            {
                username: $("#name").val(),
                email: $("#email").val(),
                message: $("#message").val()
            },

            function (results) {

                console.log("name" + $("#name").val());
                console.log($("#email").val());
                console.log($("#message").val());

                alert(results);
            });
    });

}

//regex and value check
$("#name").focusout(function () {
    $.post('message.php',
        {
            name: true,
            nameValue: $(this).val()
        }, function (results) {
            $('#username_error').html(results);
        });
});

$("#message").focusout(function () {
    $.post('message.php',
        {
            message: true,
            messageValue: $(this).val()
        }, function (results) {
            $('#message_error').html(results);
        });
});

$("#email").focusout(function () {
    $.post('message.php',
        {
            email: true,
            emailValue: $(this).val()
        }, function (results) {
            $('#email_error').html(results);
        });
});
