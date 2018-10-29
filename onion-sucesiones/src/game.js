    var config = {
        type: Phaser.AUTO,
        parent: 'juego',
        width: 800,
        height: 600,
        physics: {
            default: 'arcade',
            arcade: {
                gravity: { y: 300 },
                debug: false
            }
        },
        scene: {
            preload: preload,
            create: create,
            update: update
        }
    };

    var player;
    var platforms;
    var score = 0;
    var puntaje = 0;
    var puntajeText;
    var stars1;

    /*var stars2;
    var stars3;*/

    var game = new Phaser.Game(config);



    function preload ()
    {
        this.load.image('sky','assets/sky.png');
        this.load.image ('ground', 'assets/platform.png');
        this.load.image ('piso', 'assets/grass.png');
        this.load.image ('star', 'assets/star.png');
        this.load.image ('uno', 'assets/stars1.png');
        this.load.image ('dos', 'assets/stars2.png');
        this.load.image ('tres', 'assets/stars3.png');
        this.load.image ('cuatro', 'assets/stars4.png');
        this.load.image ('cinco', 'assets/stars5.png');
        this.load.image ('seis', 'assets/stars6.png');
        this.load.image ('siete', 'assets/stars7.png');
        this.load.image ('ocho', 'assets/stars8.png');
        this.load.image ('nueve', 'assets/stars9.png');
        this.load.image ('diez', 'assets/stars10.png');
        this.load.image ('bomb', 'assets/bomb.png');
        this.load.image ('circulo1', 'assets/circulo1.png');
        this.load.image ('circulo2', 'assets/circulo2.png');
        this.load.image ('circulo3', 'assets/circulo3.png');
        this.load.image ('circulo4', 'assets/circulo4.png');
        this.load.image ('circulo5', 'assets/circulo5.png');
        this.load.image ('circulo6', 'assets/circulo6.png');
        this.load.image ('circulo7', 'assets/circulo7.png');
        this.load.image ('circulo8', 'assets/circulo8.png');
        this.load.image ('circulo9', 'assets/circulo9.png');
        this.load.image ('circulo10', 'assets/circulo10.png');
        this.load.spritesheet ('dude', 'assets/dude.png', {frameWidth: 32, frameHeight: 48} );
        //this.load.spritesheet ('starse', 'assets/starsheet.png', {frameWidth: 24, frameHeight: 22, endFrame: 1})
    }

    function create ()
    {
       
        this.add.image(400, 300, 'sky');
        this.circulo1 = this.add.image(300, 15, 'circulo1').setScale(1.9);
        this.circulo2 = this.add.image(340, 17, 'circulo2').setScale(1.9);
        this.circulo3 = this.add.image(380, 17, 'circulo3').setScale(1.9);
        this.circulo4 = this.add.image(420, 17, 'circulo4').setScale(1.9);
        this.circulo5 = this.add.image(460, 17, 'circulo5').setScale(1.9);
        this.circulo6 = this.add.image(500, 17, 'circulo6').setScale(1.9);
        this.circulo7 = this.add.image(540, 17, 'circulo7').setScale(1.9);
        this.circulo8 = this.add.image(580, 17, 'circulo8').setScale(1.9);
        this.circulo9 = this.add.image(620, 17, 'circulo9').setScale(1.9);
        this.circulo10 = this.add.image(660, 17, 'circulo10').setScale(1.9);


        platforms = this.physics.add.staticGroup();
       /*var config = {
        key: 'rotar',
        frames: this.anims.generateFrameNumbers('starse', { start: 0, end: 1, first: 1 }),
        frameRate: 20,
        repeat: -1
    };

    this.anims.create(config);

    var boom = this.add.sprite(400, 300, 'starse');

    boom.anims.play('rotar'); */
        // creacion de las plataformas
        platforms.create(400, 568, 'piso').setScale(16, 1.3).refreshBody();

        platforms.create(600, 400, 'ground');
        platforms.create(50, 250, 'ground');
        platforms.create(750, 220, 'ground');
        //fisica del personaje
        player = this.physics.add.sprite (100, 450, 'dude');

        player.setBounce(0.2);
        player.setCollideWorldBounds(true);
        player.body.setGravityY(300);
        //animaciones del sprite del personaje
        this.anims.create ({
            key: 'left',
            frames: this.anims.generateFrameNumbers('dude', { start: 0, end: 3 }),
            frameRate:10,
            repeat: -1
        });

        this.anims.create ({
            key: 'turn',
            frames: [ { key: 'dude', frame: 4 } ],
            frameRate: 20
        });

        this.anims.create({
            key: 'right',
            frames: this.anims.generateFrameNumbers('dude', { start: 5, end: 8 }),
            frameRate: 10,
            repeat: -1
        });
        //VARIABLE PARA EL TECLADO
        cursors = this.input.keyboard.createCursorKeys();
        //COLISION ENTRE EL PERSONAJE Y LAS PLATAFORMAS
        this.physics.add.collider(player, platforms);
        // creacion de las estrellas
       /* stars = this.physics.add.group({
            key: 'star',
            repeat: 2,
            setXY: {x: 12, y: 0, stepX: 70},
        });

        stars.children.iterate(function (child){
            child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));
        });*/
        // TEXTO DE PUNTAJE
        puntajeText = this.add.text(16, 16, 'Puntos: 0', { fontSize: '32px', fill: '#000'});
        // colision estrellas con plataformas y personaje junta estrellas
        /*this.physics.add.collider(stars, platforms);
        this.physics.add.overlap(player, stars, collectStar, null, this);
*/  //BOMBA
        bombs = this.physics.add.group();
        this.physics.add.collider(bombs,platforms);
        this.physics.add.collider(player, bombs, hitBomb, null, this);

         //numero 1

        stars1 = this.physics.add.group({
            key: 'uno',
            setXY:{x:250, y:0},
            setScale: {
                x:1.9,
                y:1.9
            },
        });
        this.physics.add.overlap(player, stars1, collectStar1, null, this);
        this.physics.add.collider(stars1, platforms);
        stars1.children.iterate(function(child){
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)); 
        //child.setScale(1.3);
        }); 
        //NUMERO 2, FISICA Y REBOTE
        stars2 = this.physics.add.group({
            key:'dos',
            setXY:{x:300, y:0}
        });
        this.physics.add.overlap(player, stars2, collectStar2, null, this);
        this.physics.add.collider(stars2, platforms);
        stars2.children.iterate(function(child){
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)); 
        child.setScale(1.9);
        });

        //NUMERO 3, FISICA Y REBOTE
        stars3 = this.physics.add.group({
            key:'tres',
            setXY:{x:370, y:0}
        });
        this.physics.add.overlap(player, stars3, collectStar3, null, this);
        this.physics.add.collider(stars3, platforms);
        stars3.children.iterate(function(child){
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));
        child.setScale(1.9);
        });

        //NUMERO 4, FISICA Y REBOTE
        stars4 = this.physics.add.group({
            key:'cuatro',
            setXY:{x:410, y:0}
        });
        this.physics.add.overlap(player, stars4, collectStar4, null, this);
        this.physics.add.collider(stars4, platforms);
        stars4.children.iterate(function(child){
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));
        child.setScale(1.9);
        });

        //NUMERO 5,FISICA Y REBOTE
        stars5 = this.physics.add.group({
            key:'cinco',
            setXY:{x:700, y:300}
        });
        this.physics.add.overlap(player, stars5, collectStar5, null, this);
        this.physics.add.collider(stars5, platforms);
        stars5.children.iterate(function(child){
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));
        child.setScale(1.9);
        });

        //NUMERO 6, FISICA Y REBOTE
        stars6 = this.physics.add.group({
            key:'seis',
            setXY:{x:44, y:300}
        });
        this.physics.add.overlap(player, stars6, collectStar6, null, this);
        this.physics.add.collider(stars6, platforms);
        stars6.children.iterate(function(child){
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));
        child.setScale(1.9);
        });

        //NUMERO 7, FISICA Y REBOTE
        stars7 = this.physics.add.group({
            key:'siete',
            setXY:{x:25, y:0}
        });
        this.physics.add.overlap(player, stars7, collectStar7, null, this);
        this.physics.add.collider(stars7, platforms);
        stars7.children.iterate(function(child){
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));
        child.setScale(1.9);
        });

        // NUMERO 8, FISICA Y REBOTE
        stars8 = this.physics.add.group({
            key:'ocho',
            setXY:{x:557, y:0}
        });
        this.physics.add.overlap(player, stars8, collectStar8, null, this);
        this.physics.add.collider(stars8, platforms);
        stars8.children.iterate(function(child){
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));
        child.setScale(1.9);
        });

        //NUMERO 9, FISICA Y REBOTE
        stars9 = this.physics.add.group({
            key:'nueve',
            setXY:{x:500, y:0}
        });
        this.physics.add.overlap(player, stars9, collectStar9, null, this);
        this.physics.add.collider(stars9, platforms);
        stars9.children.iterate(function(child){
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));
        child.setScale(1.9);
        });

        stars10 = this.physics.add.group({
            key:'diez',
            setXY:{x:650, y:0}
        });
        this.physics.add.overlap(player, stars10, collectStar10, null, this);
        this.physics.add.collider(stars10, platforms);
        stars10.children.iterate(function(child){
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));
        child.setScale(1.9);
        });
    }

    function update ()
    {
        //movimientos del personaje
        if (cursors.left.isDown)
        {
            player.setVelocityX(-160);

            player.anims.play('left', true);
        }
        else if (cursors.right.isDown)
        {
            player.setVelocityX(160);

            player.anims.play('right', true);
        }
        else
        {
            player.setVelocityX(0);

            player.anims.play('turn', true);
        }
        if (cursors.space.isDown && player.body.touching.down)
        {
            player.setVelocityY(-530);
        }
    }
    function crearEstrellas(){
        
           stars1.create(25, Phaser.Math.FloatBetween(120,400), 'uno').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9).getBounds();
            stars2.create(65, Phaser.Math.FloatBetween(0,120), 'dos').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);       
            stars3.create(100, Phaser.Math.FloatBetween(120,400), 'tres').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            stars4.create(150, Phaser.Math.FloatBetween(0,120), 'cuatro').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            stars5.create(250, Phaser.Math.FloatBetween(120,400), 'cinco').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            stars6.create(350, Phaser.Math.FloatBetween(120,400), 'seis').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            stars7.create(450, Phaser.Math.FloatBetween(0,120), 'siete').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            stars8.create(550, Phaser.Math.FloatBetween(120,400), 'ocho').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            stars9.create(650, Phaser.Math.FloatBetween(120,400), 'nueve').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            stars10.create(750, Phaser.Math.FloatBetween(0,120), 'diez').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);


    }
    function collectStar1 (player,stars1)
    {
         if (score ==0){
            stars1.disableBody(true, true);
            score += 10;
            puntaje +=10
            puntajeText.setText('Puntos: ' + puntaje);
            this.star1 = this.add.sprite(300, 20, 'uno').setScale(1.9);
            this.circulo1.destroy();
        }

        /*if(stars1.countActive (true)===0){
            stars1.children.iterate(function (child){
                child.enableBody (true, child.x, 0, true, true);
            });*/
            
        } 
    

    function collectStar2 (player,stars2)
    {
         if (score > 0){
            stars2.disableBody(true, true);
            score += 10;
            puntaje +=10
            puntajeText.setText('Puntos: ' + puntaje);
            this.star2 = this.add.image(340, 20, 'dos').setScale(1.9);
            this.circulo2.destroy();
        }
    }

    function collectStar3 (player, stars3)
    {
        if (score>10){
            stars3.disableBody(true, true);
            score +=10;
            puntaje +=10
            puntajeText.setText('Puntos: ' + puntaje);
            this.star3 = this.add.image(380, 20, 'tres').setScale(1.9);
            this.circulo3.destroy();
        }
    }

    function collectStar4 (player, stars4)
    {
        if (score>20){
            stars4.disableBody(true, true);
            score +=10;
            puntaje +=10
            puntajeText.setText('Puntos: ' + puntaje);
            this.star4 = this.add.image(420, 20, 'cuatro').setScale(1.9);
            this.circulo4.destroy();
        }
    }

        function collectStar5 (player, stars5)
    {
        if (score>30){
            stars5.disableBody(true, true);
            score +=10;
            puntaje +=10
            puntajeText.setText('Puntos: ' + puntaje);
            this.star5 = this.add.image(460, 20, 'cinco').setScale(1.9);
            this.circulo5.destroy();

            var x = (player.x <400)? Phaser.Math.Between(400, 800): Phaser.Math.Between (0, 400);
            var bomb = bombs.create (x, 16, 'bomb');
            bomb.setBounce(1);
            bomb.setCollideWorldBounds(true);
            bomb.setVelocity(Phaser.Math.Between(-200, 200), 20);
            bomb.allowGravity = false;
        }
    }

        function collectStar6 (player, stars6)
    {
        if (score>40){
            stars6.disableBody(true, true);
            score +=10;
            puntaje +=10
            puntajeText.setText('Puntos: ' + puntaje);
            this.star6 = this.add.image(500, 20, 'seis').setScale(1.9);
            this.circulo6.destroy();
        }
    }

        function collectStar7 (player, stars7)
    {
        if (score>50){
            stars7.disableBody(true, true);
            score +=10;
            puntaje +=10
            puntajeText.setText('Puntos: ' + puntaje);
            this.star7 = this.add.image(540, 20, 'siete').setScale(1.9);
            this.circulo7.destroy();
        }
    }

            function collectStar8 (player, stars8)
    {
        if (score>60){
            stars8.disableBody(true, true);
            score +=10;
            puntaje +=10
            puntajeText.setText('Puntos: ' + puntaje);
            this.star8 = this.add.image(580, 20, 'ocho').setScale(1.9);
            this.circulo8.destroy();

            var x = (player.x <400)? Phaser.Math.Between(400, 800): Phaser.Math.Between (0, 400);
            var bomb = bombs.create (x, 16, 'bomb');
            bomb.setBounce(1);
            bomb.setCollideWorldBounds(true);
            bomb.setVelocity(Phaser.Math.Between(-200, 200), 20);
            bomb.allowGravity = false;
        }
    }

            function collectStar9 (player, stars9)
    {
        if (score>70){
            stars9.disableBody(true, true);
            score +=10;
            puntaje +=10
            puntajeText.setText('Puntos: ' + puntaje);
            this.star9 = this.add.image(620, 20, 'nueve').setScale(1.9);
            this.circulo9.destroy();
        }
    }

            function collectStar10 (player, stars10)
    {
        if (score>80){
            stars10.disableBody(true, true);
            score -=90;
            puntaje +=10
            puntajeText.setText('Puntos: ' + puntaje);
            this.star10 = this.add.image(660, 20, 'diez').setScale(1.9);
            this.circulo10.destroy();
            this.star1.destroy();
            this.star2.destroy();
            this.star3.destroy();
            this.star4.destroy();
            this.star5.destroy();
            this.star6.destroy();
            this.star7.destroy();
            this.star8.destroy();
            this.star9.destroy();
            this.star10.destroy();
            crearEstrellas();
        }
    }
    function hitBomb (player, bomb)
    {
        if (score<10){
            bomb.disableBody(true,true);
            puntaje -=10;
            puntajeText.setText('Puntos: ' + puntaje);
        }
        else{
        score-=10;
        puntaje -=10;
        puntajeText.setText('Puntos: ' + puntaje);
        bomb.disableBody(true,true);
        if(score == 0){ 
            stars1.create(Phaser.Math.FloatBetween(5,400), Phaser.Math.FloatBetween(120,400), 'uno').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            this.star1.destroy();
        }
        if(score == 10){ 
            stars2.create(Phaser.Math.FloatBetween(5,400), Phaser.Math.FloatBetween(5,400), 'dos').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            this.star2.destroy();
        
        }
        if(score == 20){ 
            stars3.create(Phaser.Math.FloatBetween(5,400), Phaser.Math.FloatBetween(5,400), 'tres').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            this.star3.destroy();
        
        }
        if(score == 30){ 
            stars4.create(Phaser.Math.FloatBetween(5,400), Phaser.Math.FloatBetween(5,400), 'cuatro').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            this.star4.destroy();
        
        }
        if(score == 40){ 
            stars5.create(Phaser.Math.FloatBetween(5,400), Phaser.Math.FloatBetween(5,400), 'cinco').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            this.star5.destroy();
        
        }
        if(score ==50){ 
            stars6.create(Phaser.Math.FloatBetween(5,400), Phaser.Math.FloatBetween(5,400), 'seis').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            this.star6.destroy();
        
        }
        if(score === 60){ 
            stars7.create(Phaser.Math.FloatBetween(5,400), Phaser.Math.FloatBetween(5,400), 'siete').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            this.star7.destroy();
        
        }
        if(score == 70){ 
            stars8.create(Phaser.Math.FloatBetween(5,400), Phaser.Math.FloatBetween(5,400), 'ocho').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            this.star8.destroy();
        
        }
        if(score == 80){ 
            stars9.create(Phaser.Math.FloatBetween(5,400), Phaser.Math.FloatBetween(5,400), 'nueve').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            this.star9.destroy();
       
        }
        if(score == 90){ 
            stars10.create(Phaser.Math.FloatBetween(5,400), Phaser.Math.FloatBetween(5,400), 'diez').setBounceY(Phaser.Math.FloatBetween(0.4, 0.8)).setScale(1.9);
            this.star10.destroy();
        }
    }
        /*player.setTint(0xff0000);
        player.anims.play('turn');
        gameOver = true;*/
    }

