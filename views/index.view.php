
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
</head>

<body>
    <div class="container">
        <h2>Kontaktai</h2>
        <?php if(isset($_POST['submit'])):?>
            <?php validate($_POST);?>
            <?php endif;?>
            <?php if(sizeof($validationErrors)==0):?>
            <?php
    if(isset($_POST['submit'])){
      //  saveMessage($_POST);
      foreach($_POST as $value){
        echo "$value<br>";
      }
        header('Location:http://form.ddev.site'); // nukreipimo funkcija
    }
            ?>
            </php saveMessage($_POST);?>
            <?php else:?>
                <ul>
                    <?php foreach ($validationErrors as $error):?>
                        <li class="alert alert-danger"><?=$error;?></li>
                        <?php endforeach;?>
                </ul>
                <?php endif;?>

        
        <form method="post">
            <div class="form-group">
                <select name="company" class="form-control">
                    <option selected disabled>--Pasirinkite įmonę--</option>
                    <?php foreach($companies as $code => $company):?>
                        <?php if(!in_array($company, $blackList)):?>
                    <option value="<?=$company;?>"><?=$company;?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <select name="departments" class="form-control">
                    <option selected disabled>--Pasirinkite departamentą--</option>
                    <?php foreach($departments as $code => $department):?>    
                    <option value="<?=$department;?>"><?=$department;?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="firstName" placeholder="Vardas" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="email" placeholder="email" class="form-control">
            </div>
            <div class="form-group">
                <textarea name="message" placeholder="Jūsų žinutė" class="form-control"></textarea>
            </div>
            <div class="form=group">
                <input type="text" placeholder="Nuoroda" name="link" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success">Rodyti</button>
            </div>
        </form>
        <section>
            <h2>Klientu zinutes</h2>
            <table class="table table-bordered table striped">
                    <tr>
                        <th>Imone</th>
                        <th>Departamentas</th>
                        <th>Vardas</th>
                        <th>El. pastas</th>
                        <th>Zinute</th>
                    </tr>
                    <?php foreach(getData() as $list): // isorinis ciklas, kai iteruojame per masyva?>
                        <tr>
                            <?php $list = explode(',',$list);  // konvertuojame stringa i masyva?>
                            <?php foreach($list as $item):  // iteruojame per masyva vidiniame cikle?>
                                <?php if(!empty($item)):  // tikriname ar laukelis nera tuscias?>
                                <td><?=$item;  // jeigu salyga tenkinama - atvaizduojame?></td>
                            <?php endif;?>
                            <?php endforeach;?>   
                        </tr>
                    <?php endforeach;?>
            </table>
        </section>

    </div>
</body>

</html>