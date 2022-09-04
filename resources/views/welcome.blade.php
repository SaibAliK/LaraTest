<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpine Js Practice</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>
    <div x-data="{ 
        message: 'Testing <h3>Alpine.js</h3>',
        name: 'Maaz',
        input_data: '',
        open: false,
        place_data: 'Enter keyword',
        firstPara: false,
        secondPara: false,
        posts:[
            {title: 'First post'},
            {title: 'Second post'},
            {title: 'Third post'},
            {title: 'Fourth post'},
            ],
             }">

        <div>
            <h1 x-text="message"></h1>
            <h1 x-html="message"></h1>
            <p x-show="firstPara" x-transition>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of Letraset sheets containing Lorem Ipsum passages,
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p x-show="secondPara">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of Letraset sheets containing Lorem Ipsum passages,
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>

            <button @click="firstPara = !firstPara ,secondPara=!secondPara">Toggle</button>

            <h2 x-text="name">Dynamic Data : </h2>

            <div x-effect="console.log(firstPara)"></div>

            <input type="text" x-model.debounce.500ms="input_data" :placeholder="place_data">
            <p x-text="input_data"></p>
        </div>

        <template x-if="firstPara">
            <p style="color: red;">If Conditio in Alpine.js is working</p>
        </template>

        <hr>

        <h2>For loop in apline.js</h2>
        <template x-for="post in posts">
            <div x-text="post.title"></div>
        </template>

        <hr>

        <div>
            <!--   ref and refs -->
            <div x-ref="text"></div>
            <button @click="$refs.text.innerText = 'Hello World'">
                Click
            </button>
        </div>

        <hr>

        <div @foot="alert('Testing Dispatch function')">
            <form action="" @submit.prevent>
                <input type="text" name="first_name">
                <!-- <button @click="$event.target.remove()">Submit</button> -->
                <button @click="$dispatch('foot')">Submit</button>
                <h1>Data Less Components</h1>
                <button @click="handleClick">Call Custom Function</button>

            </form>
        </div>

        <hr>
        <h2>Testing Reusable Data</h2>
        <div x-data="drop">
            <button @click="toggle">Toggle</button>
            <div x-show="open">
                Content...
            </div>
        </div>

        <div x-init="console.log('I\'m being initialized!')"></div>


        <hr>

        <div>
            <h1> Alpine Store function</h1>
            <template x-foreach="item in $store.article">
                <p x-text="item"></p>
            </template>
            <h3 x-data x-text="$store.article.title"></h3>
        </div>

        <hr>
        <div>
            <p>Color Chanlenge</p>
            <div x-data="{colors:['red','green','blue','yellow']}">
                <template x-for="color in colors">
                    <!-- <p x-text="color"></p> -->
                    <div style="width: 40px;height:40px; background-color:red; margin-top:10px;" :style=" { backgroundColor: color }"></div>
                </template>
            </div>
        </div>

        <hr>
        <div x-data="{text_color:'black', backgroundColor:'gray',id:'1'}">
            <p>
                Second Challenge (Make Custom Button)
            </p>
            <div>
                <div>
                    <label for="">Enter Button Text Color</label>
                    <input type="text" x-model="text_color" placeholder="Enter Text Color">
                </div>
                <div>
                    <label for="">Enter Button backGround Color</label>
                    <input type="text" placeholder="Enter Background Color" x-model="backgroundColor">
                </div>
                <div>
                    <label for="">Enter Button Id</label>
                    <input type="text" placeholder="Enter ID of Button" x-model="id">
                </div>
                <button x-transition :style="{backgroundColor: backgroundColor,color:text_color}" :id="id" style="color:white;">Custom Button</button>
            </div>
        </div>

    </div>

    <script>
        function handleClick(e) {
            alert("Custom");
        }

        document.addEventListener('alpine:init', () => {
            console.log("init function is running");
            Alpine.data('drop', () => ({
                toggle() {
                    this.open = !this.open
                }
            }));

            Alpine.store('article', {
                title: 'first article',
                title: 'second article',
                title: 'third article',
                post: [
                    'first post', 'second post'
                ]
            });
        });
    </script>

</body>

</html>