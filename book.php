    
    
    
    <head>
        <style>

@media (max-width:2400px){

body{
    font-size: 16px;
    background-color: aliceblue;
}
html{
    font-size: 55%;
}

div{
    padding:3rem 2rem;

}
.text-body-emphasis{
    font-size: 10vw;
}
}
.btn-cont{
    text-align: center;
}
.booking .book-form{
padding:2rem;
background: var(--light-bg);
}

.booking .book-form .flex{
display:flex;
flex-wrap: wrap;
gap:2rem;
}
.booking .book-form .flex .inputBox{
flex:1 1 41rem;
}

.booking .book-form .flex .inputBox input{
    --border: 0.5px solid black;
width: 100%;
padding:1.2rem 1.4rem;
font-size:1.6rem;
color: var(--light-bg);
text-transform: none;
margin-top: 1.5rem;
border: var(--border);
}
.booking .book-form .flex .inputBox input:focus{
background: var(--black);
color:var(--white);
}
.booking .book-form .flex .inputBox input:focus::placeholder{
color:var(--light-white);
}
.booking .book-form .flex .inputBox span{
font-size: 2rem;
color:var(--light-black);
} 
.booking .book-form .btn{
margin-top: 2rem;
}</style>
    </head>

    
    
    
    <body>
    <section class="booking">
        <h1 class="heading-title">Booking Form</h1>
         <form action="book_form.php" method="post" class="book-form">
            <div class="flex">
                <div class="inputBox">
                    <span>Name :</span>
                    <input type="text" placeholder="Enter name" name="name" required>
                </div>
                <div class="inputBox">
                    <span>Email address :</span>
                    <input type="email" placeholder="Enter email" name="email" required  pattern=".+@gmail.com">
                </div>
                <div class="inputBox">
                    <span>Phone number :</span>
                    <input type="text" placeholder="Enter phone number" name="phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>

                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <input type="text" placeholder="Enter address" name="address" required>
                </div>
                <div class="inputBox">
                    <span>Where to :</span>
                    <input type="text" placeholder="Where do you want to go?" name="location" oninput="this.value = this.value.replace(/[^a-z]/g, '')" required>
                </div>
                <div class="inputBox">
                    <span>How many :</span>
                    <input type="text" placeholder="How many guests?" name="guests" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                </div>
                <div class="inputBox">
                    <span>Arrival Date :</span>
                    <input type="date" name="arrivals" required
       min="1000-01-01" max="9999-12-31">

                </div>
                <div class="inputBox">
                    <span>Departure Date :</span>
                    <input type="date"  name="leaving" required min="1000-01-01" max="9999-12-31">
                </div>
            </div class="btn-cont">
            <input type="submit" value="Submit" class="btn" name="send">
         </form>
    </section>
    </body>
    