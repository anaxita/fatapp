$(document).ready(function() {

      /**
     * cookies
     * 
     * 
     */

  function getCookieValue(name) {
    let result = document.cookie.match("(^|[^;]+)\\s*" + name + "\\s*=\\s*([^;]+)")
    return result ? result.pop() : ""
}
let cookieUserId = getCookieValue('userid');


    /**
     * load all messages in the chat
     * 
     */

    $.ajax({
      url: "/modules/user/load-message.php",
      method: "POST",
      data: {},
      dataType: "JSON",
      beforeSend: () => {
      },
      success: (data) => {
        let div = $( ".chat-message" );
        let color;

        for (newdata in data) {
          if (data[newdata]['userid'] == cookieUserId) {

            div.append(`
            <div class="card bg-primary rounded w-75 z-depth-0 mb-2 float-right" id="msg-userid${data[newdata]['userid']}">                    
            <div class="card-body p-2">
            <p><strong>${data[newdata]['username']}</strong> <small>${data[newdata]['date']}</small></p>
            <p class="card-text text-white" id="${data[newdata]['msgid']}">${data[newdata]['message']}</p>
            </div>
            </div>
            `);
          } else {
              div.append(`
              <div class="card bg-light rounded w-75 z-depth-0 mb-2" id="msg-userid${data[newdata]['userid']}"> 
              <div class="card-body p-2">
              <p><strong>${data[newdata]['username']}</strong> <small>${data[newdata]['date']}</small></p>                 
              <p class="card-text text-primary" id="${data[newdata]['msgid']}">${data[newdata]['message']}</p>
              </div>
              </div>
              `);
          }
            $("#main-chat-window").scrollTop(div.prop('scrollHeight'));
          }
    }
  });


    /**
     * send message and append data
     * 
     */

    $( "#send-chat-message").click( (e) => {
        e.preventDefault()
        const message = $( "#chat-input-message").val();
        if (message == "" ) {
          alert("Сообщение не должно быть пустым");
          return false;
        }

        $.ajax({
          url: "/modules/user/chat.php",
          method: "POST",
          data: {message},
          dataType: "JSON",
          beforeSend: () => {
            $( "#chat-input-message").val('');
          },
          success: (data) => {
          }
        });
      });
        Pusher.logToConsole = false;      
        let pusher = new Pusher('5c739bbae47c174d32b1', {
        cluster: 'eu'
        });      

        let channel = pusher.subscribe('my-channel2');
        channel.bind('my-event', function(data) {
        let div = $( ".chat-message" );
        if (data['userid'] == cookieUserId) {
          div.append(`
          
          <div class="card bg-primary rounded w-75 z-depth-0 mb-2 float-right" id="msg-userid${data['userid']}">                    
          <div class="card-body p-2">
          <p><strong>${data['username']}</strong> <small>${data['date']}</small></p>
          <p class="card-text text-white" id="${data['msgid']}">${data['message']}</p>
          </div>
          </div>
          `);
        } else {
          div.append(`
          <div class="card bg-light rounded w-75 z-depth-0 mb-2" id="msg-userid${data['userid']}">                    
          <div class="card-body p-2">
          <p><strong>${data['username']}</strong> <small>${data['date']}</small></p>
          <p class="card-text text-primary" id="${data['msgid']}">${data['message']}</p>
          </div>
          </div>
          `);
        }
        $("#main-chat-window").scrollTop(div.prop('scrollHeight'));
        })


    })