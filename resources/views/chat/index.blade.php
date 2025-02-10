<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Me</title>

    <!-- Style Custom Css Starts Here -->
    <link rel="stylesheet" href="/style.css">

    <!-- FavIcon Added Here -->

    <!-- Link For Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    
    <!-- Link For Google Icons  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <style>
            *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    /* Default Color */

    :root{
        --text-color: #ffffff;
        --icon-color: #acacbe;
        --icon-hover-bg: #5b5e71;
        --placeholder-color: #cccccc;
        --outgoing-chat-bg: black;
        --incoming-chat-bg: #444654;
        --outgoing-chat-border: #343541;
        --incoming-chat-border: #444654;
    }

    /* Light Mode */
    .light-mode{
        --text-color: #343541;
    --icon-color: #a9a9c;
    --icon-hover-bg: #f1f1f3;
    --placeholder-color: #9f9f9f;
    --outgoing-chat-bg: #ffffff;
    --incoming-chat-bg: #f7f7f8;
    --outgoing-chat-border: #ffffff;
    --incoming-chat-border: #d9d9e3;
    }
    body{
        background: var(--outgoing-chat-bg);
    }
    .chat-container{
        max-height: 100vh;
        padding-bottom: 150px;
        overflow-y: auto;
    }
    .Default-Text{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: var(--text-color);
        height: 70vh;
        text-align: center;
        padding: 0 10px;
    }
    .Default-Text h1{
        font-size: 3.3rem;
    }
    .Default-Text p{
        margin-top: 2px;
        font-size: 1.70rem;
    }
    .chat-container .chat{
        padding: 25px 10px;
        display: flex;
        justify-content: center;
        color: var(--text-color);
    }
    .chat-container .outgoing{
        background-color: var(--outgoing-chat-bg);
        border: 1px solid var(--outgoing-chat-border);
    }
    .chat-container .incoming{
        background-color: var(--incoming-chat-bg);
        border: 1px solid var(--incoming-chat-border);
    }
    .chat .chat-content-box{
        max-width: 1200px;
        width: 100%;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }
    .chat .chat-content-box span{
        color: var(--icon-color);
        font-size: 1.3rem;
        visibility: hidden;
    }
    .chat:hover .chat-content-box:not(:has(.loading-dots-animation)) span{
        visibility: visible;
    }
    .chat-container .chat-details{
    }
    .chat-container .chat-details p{
    white-space: pre-wrap;
    font-size: 1.05rem;
    padding: 0 5px 0 25px;
    }

    li {
        list-style-type: none;
    }

    p.error{
    color: rgb(255, 43, 43);
    }

    .chat-container .chat-details img{
    width: 40px;
    height: 40px;
    border-radius: 2px;
    object-fit: cover;
    align-self: flex-start;
    }
    span.material-symbols-rounded{
        user-select: none;
        cursor: pointer;
    }
    .loading-dots-animation{
        display: inline-flex;
        padding-left: 25px ;
    }
    .loading-dots-animation .loading-dot{
        background: var(--text-color);
        height: 7px;
        width: 7px;
        border-radius: 50%;
        margin: 0 3px;
        opacity: 0.7;
        animation: MakeLoadingAnimation 1.5s ease-in-out var(--delay) infinite;
    }

    @keyframes MakeLoadingAnimation {
        0%, 44% {
            transform: translate(0px);
        }
        22%{
            opacity: 0.4;
            transform: translateY(-6px);
        }
        44% {
            opacity: 0.2;
        }
    }

    .user-input-container{
        position: fixed;
        bottom: 0;
        width: 100%;
        background: var(--outgoing-chat-bg);
        border: 1px solid var(--incoming-chat-border);
        display: flex;
        justify-content: center;
        padding: 20px 10px;
    }
    .user-input-container .user-input-content{
        display: flex;
        align-items: flex-start;
        max-width: 950px;
        width: 100%;
    }
    .user-input-container .user-input-textarea{
        display: flex;
        position: relative;
        width: 100%;
    }
    .user-input-textarea textarea{
        width: 100%;
        height: 55px;
        border: none;
        resize: none;
        font-size: 1rem;
        color: var(--text-color);
        background: var(--incoming-chat-bg);
        border-radius: 4px;
        outline: 1px solid var(--incoming-chat-bg);
        padding: 15px 45px 15px 20px;
        max-height: 250px;
        overflow-y: auto;
    }
    .user-input-textarea textarea::placeholder{
        color: var(--placeholder-color);
    }
    .user-input-textarea span {
        position: absolute;
        bottom: 0;
        right: 0;
        visibility: hidden;
    }
    .user-input-textarea textarea:valid ~ span {
        visibility: visible;
    }
    .user-input-content span{
        height: 55px;
        width: 55px;
        color: var(--text-color);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .typing-controls{
        display: flex;
    }
    .typing-controls span{
        margin-left: 7px;
        font-size: 1.4rem;
        border-radius: 4px;
        background: var(--incoming-chat-bg);
        border: var(--incoming-chat-bg);
    }

    :where(.chat-container, textarea)::-webkit-scrollbar{
        width: 6px;
    }
    :where(.chat-container, textarea)::-webkit-scrollbar-track{
        background: var(--incoming-chat-bg);
        border-radius: 25px;
    }
    :where(.chat-container, textarea)::-webkit-scrollbar-thumb{
        background: var(--icon-color);
        border-radius: 25px;
    }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar')    
      <!-- chat-container for outgoing and outgoing chat-->
    <div class="chat-container"></div>

    
  <!-- User Pormpt Input Container Starts Here -->

            <div class="user-input-container">
                <div class="user-input-content">
                    <div class="user-input-textarea">
                        <textarea id="chat-input" placeholder="Enter your prompt here" required></textarea>
                        <span id="send-btn" class="material-symbols-rounded">send</span>
                    </div>
                    <div class="typing-controls">
                        <span id="theme-btn" class="material-symbols-rounded">light_mode</span>
                        <span id="delete-btn" class="material-symbols-rounded">delete</span>
                    </div>
                </div>
            </div>
  
            <script>
                $(document).ready(function () {
    const PromptInput = $("#chat-input");
    const SendBtn = $("#send-btn");
    const ChatContainer = $(".chat-container");
    const ThemeBtn = $("#theme-btn");
    const DeleteBtn = $("#delete-btn");

    let UserPrompt = null;

    const CreateElement = (html, ClassName) => {
        const ChatDiv = $("<div></div>").addClass("chat " + ClassName).html(html);
        return ChatDiv;
    };


    const DataFromLocalStorage = () => {
        let ThemeSwitcher = localStorage.getItem("Theme-Switcher");
        $("body").toggleClass("light-mode", ThemeSwitcher === "light_mode");
        ThemeBtn.text(ThemeSwitcher || "light_mode");

        let AllChats = localStorage.getItem("All-Chats");
        if (AllChats) {
            ChatContainer.html(AllChats);
        } else {
            ChatContainer.html(`
                <div class="Default-Text">
                    <h1>Chat Me</h1>
                    <p>Future of AI !</p>
                </div>
            `);
        }
        ChatContainer.scrollTop(ChatContainer.prop("scrollHeight"));
    };

    DataFromLocalStorage();

    const GetGeminiResponses = async (IncominChatDiv) => {
        let PElement = $("<p></p>");
        try {
            SendBtn.prop("disabled", true);

            // Kirim permintaan ke backend Laravel
            const response = await $.ajax({
                url: '/chat-fetch',
                type: 'POST',
                data: {
                    prompt: UserPrompt,
                    _token: "{{ csrf_token() }}"
                }
            });

            PElement.html(response.result.trim());
            PromptInput.val("");
        } catch (error) {
            console.log(error);
            PElement.addClass("error");
            PElement.text("Chat Bot sudah melebihi limit atau sedang error.");
        }

        IncominChatDiv.find(".loading-dots-animation").remove();
        IncominChatDiv.find(".chat-details").append(PElement);
        ChatContainer.scrollTop(ChatContainer.prop("scrollHeight"));
        localStorage.setItem("All-Chats", ChatContainer.html());
    };

    const CopyResponses = (CopyBtn) => {
        let ResponseText = $(CopyBtn).parent().find("p");
        navigator.clipboard.writeText(ResponseText.text());
        $(CopyBtn).text("done");
        setTimeout(() => $(CopyBtn).text("content_copy"), 1000);
    };

    const TypyingAnimation = () => {
        const html = `<div class="chat-content-box">
                        <div class="chat-details">
                            <img src="https://th.bing.com/th/id/OIP.EJH2EONre4u8cx2QM5884wHaHb?rs=1&pid=ImgDetMain" alt="chatbot-image">
                            <div class="loading-dots-animation">
                                <div class="loading-dot" style="--delay:0.2s;" ></div>
                                <div class="loading-dot" style="--delay:0.3s;" ></div>
                                <div class="loading-dot" style="--delay:0.4s;" ></div>
                            </div>
                        </div> 
                        <span class="material-symbols-rounded">content_copy</span>
                    </div>`;
        const IncominChatDiv = CreateElement(html, "incoming");
        ChatContainer.append(IncominChatDiv);
        ChatContainer.scrollTop(ChatContainer.prop("scrollHeight"));
        GetGeminiResponses(IncominChatDiv); // Getting Generated Responses
    };

    const OutgoinChat = () => {
        UserPrompt = PromptInput.val().trim();
        if (!UserPrompt) return;
        const html = `<div class="chat-content-box">
                            <div class="chat-details">
                                <img src="https://charmouthtennisclub.org/wp-content/uploads/2021/01/placeholder-400x400.jpg" alt="user-image">
                                <p></p>
                            </div>
                        </div>`;
        const OutgoinChatDiv = CreateElement(html, "outgoing");
        ChatContainer.append(OutgoinChatDiv);
        OutgoinChatDiv.find("p").text(UserPrompt);
        $(".Default-Text").remove();
        ChatContainer.scrollTop(ChatContainer.prop("scrollHeight"));
        setTimeout(TypyingAnimation, 500);
    };

    ThemeBtn.on("click", () => {
        $("body").toggleClass("light-mode");
        localStorage.setItem("Theme-Switcher", ThemeBtn.text());
        ThemeBtn.text($("body").hasClass("light-mode") ? "dark_mode" : "light_mode");
    });

    DeleteBtn.on("click", () => {
        if (confirm("Apakah Anda yakin ingin menghapus semua chat?")) {
            localStorage.removeItem("All-Chats");
        }
        DataFromLocalStorage();
    });

    let InitialHeight = PromptInput.prop("scrollHeight");

    PromptInput.on("input", () => {
        PromptInput.height(InitialHeight).height(PromptInput.prop("scrollHeight"));
    });

    PromptInput.on("keydown", (e) => {
        if (e.key === "Enter" && !e.shiftKey && $(window).width() > 800) {
            e.preventDefault();
            OutgoinChat();
        }
    });

    SendBtn.on("click", OutgoinChat);
});
            </script>
</body>