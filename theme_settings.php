<?php

include "load_theme.php";


if ($_SERVER['REQUEST_METHOD']=="POST") {


    $theme = [

        "colors"=>[

            "primary"=>$_POST['primary'],
            "secondary"=>$_POST['secondary'],
            "background"=>$_POST['background'],
            "text"=>$_POST['text'],
            "sidebar"=>$_POST['sidebar']

        ]

    ];


    $json = json_encode($theme);


    $stmt=$conn->prepare(
        "
        INSERT INTO user_settings
        (user_id,theme)

        VALUES (?,?)

        ON DUPLICATE KEY UPDATE
        theme=?
        "
    );


    $stmt->bind_param(
        "iss",
        $user_id,
        $json,
        $json
    );


    $stmt->execute();


    header("Location: theme_settings.php");
    exit;

}

?>


<form method="post">

<h2>Theme Settings</h2>


<label>
Primary Color
</label>

<input 
type="color" 
name="primary"
value="<?= $theme['colors']['primary']; ?>">


<br>


<label>
Secondary Color
</label>

<input 
type="color" 
name="secondary"
value="<?= $theme['colors']['secondary']; ?>">


<br>


<label>
Background
</label>

<input 
type="color" 
name="background"
value="<?= $theme['colors']['background']; ?>">


<br>


<label>
Text
</label>

<input 
type="color" 
name="text"
value="<?= $theme['colors']['text']; ?>">


<br>


<label>
Sidebar
</label>

<input 
type="color" 
name="sidebar"
value="<?= $theme['colors']['sidebar']; ?>">


<br><br>


<button>
Save Theme
</button>


</form>