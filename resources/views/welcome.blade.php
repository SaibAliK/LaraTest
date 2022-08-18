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
        message: 'Testing Alp',
        name: 'Maaz',
        input_data: '',
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

            <input type="text" x-model="input_data" :placeholder="place_data">
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

                <button @click="handleClick">Call Custom Function</button>

            </form>
        </div>

    </div>

    <script>
        function handleClick(e) {
            alert("Custom")
        }
    </script>

    <script>
        $document.ready(function() {
            // testFunction() {
            //     alert("dd");
            // }
        });
        // document.addEventListener('alpine:init', () => {
        //     Apline.store('darkMode', {
        //         on: false,
        //         toggle() {
        //             this.on = !this.on
        //         }
        //     })
        // })
    </script>

</body>

</html>