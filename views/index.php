<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataBase Creation</title>
    <link rel="stylesheet" href="views/style.css">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
 <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
 <link href="css/material-dashboard.css?v=3.1.0" rel="stylesheet">
 <style>
    .col-sm-6 {
    position: relative;
    left: 360px;
}
 </style>
</head>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-center" href="/" style="color:white;">Create A Your Dynamic Databases</a>
        <div class="search-bar" style="width: 50%">
            <form action="/" method="POST">
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
        </div>
    </div>
</nav>

<body>
<div class="">
    <div class="col-sm-6 mt-7">
        <?php if($_SERVER['REQUEST_URI'] == "/"):?>
            <?php if(isset($_SESSION['sucess']))?>
            <p style="color:green;"><?php echo $_SESSION['sucess'];?></p>
            <?php unset($_SESSION['sucess']) ?>
            <form action="/dbCreate" method="POST">
                <div class="d-flex my-3">
                <label>Enter Your Database Name:</label>
                <input type="text" name="dbName" required placeholder="Enter A Database name"  style="margin-left:10px">
                <button type="submit" name="action" class="btn btn-primary" style="margin-left:10px">Create Database</button>
                </div>
            </form>
        <?php endif;?>

        <a href="/" class="btn btn-primary mt-4">Create a New Databases</a>
        <a href="/list" class="mx-5 btn btn-primary mt-5">Create A table Already Exists Database</a>
        <?php if($_SERVER['REQUEST_URI'] == "/list"):?>
            <?php if(isset($_SESSION['sucess']))?>
            <p style="color:green;"><?php echo $_SESSION['sucess'];?></p>
            <?php unset($_SESSION['sucess']) ?>
            <form action="/createTable" method="POST">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <select class="form-select mt-2" name="databaseName" onChange="select()" id="selects">
                                        <option value="" >Select a Database</option>
                                        <?php foreach($details as $datas):?>
                                        <option value="<?php echo $datas['Database'];?>"><?php echo $datas['Database'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div> 
                <div class="d-flex">
                    <label>Enter Your Table Name:</label>
                    <input type="text" name="tableNames"  placeholder="Enter A Table name"style="margin-left:10px" >
                    <button type="submit" class="btn btn-primary mt-2" name="action" style="margin-left:10px">Create Table</button>
                </div>

                <p class="mt-2">Selected Database Tables:</p>
                <select class="" name="tableName"  onChange="columns()" id="tags">
                <option value="">Select a Tables</option>
                </select>

                <p class="mt-2">Selected Table Columns:</p>
                        <div class="d-flex">
                        <div class="" name="columnName" id="column">
                        </div>
                        <div class="type">
                            
                        </div>
                        </div>
                <div class="div mt-3" >
                                <input type="text"  placeholder="Add a columns" name="columnName[]" required>
                                    <select class="" name="datatype[]">
                                        <option value="">Select a Data Type</option>
                                        <option value="int">int</option>
                                        <option value="varchar(255)">varchar(255)</option>
                                        <option value="text">Text</option>
                                        <option value="timestamp">datetime</option>
                                    </select>
                </div> 
                <button class="btn btn-primary mt-3" type="submit">Create A columns</button>            
             
            </form>
       <button class="btn btn-primary column mt-2">Add a new column</button>
       <?php endif;?>
       <a href="/addRows" class="btn btn-primary mt-3">Add Rows On Exists Table</a>
       <?php if($_SERVER['REQUEST_URI'] == "/addRows"):?>
            <form action="/insertData" method="POST">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <select class="form-select mt-2" name="databaseName" onChange="select()" id="selects">
                                        <option value="" >Select a Database</option>
                                        <?php foreach($details as $datas):?>
                                        <option value="<?php echo $datas['Database'];?>"><?php echo $datas['Database'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                <p class="mt-2">Selected Database Tables:</p>
                <select class="" name="tableName"  onChange="columns()" id="tags">
                <option value="">Select a Tables</option>
                </select>
                                
                <p class="mt-2">Selected Table Columns:</p>
                        <div class="d-flex">
                        <div class="" name="columnName" id="column">
                        </div>
                        <div class="type">
                        </div>
                        </div>
                <button type="submit" class="btn btn-primary mt-2" >Insert Data</button>
            </form>
       <?php endif;?>
    </div>
</div>
</body>
</html>

<script>
  let btn = document.querySelector('.column')
  let div = document.querySelector('.div')
   btn.addEventListener('click',()=>{
        const input = document.createElement('input')
        input.setAttribute('placeholder',"Add a Columns")
        input.setAttribute('type',"text")
        input.setAttribute('name',"columnName[]")
        const select = document.createElement('select')
        select.setAttribute('name',"datatype[]")
        const options = document.createElement('option')
        options.setAttribute('value',"")
        // options.setAttribute('')
        options.innerText = "Select a Data Type"
        const option1 = document.createElement('option')
        option1.setAttribute('value',"int")
        option1.innerText = "int"
        const option2 = document.createElement('option')
        option2.setAttribute('value',"varchar(255)")
        option2.innerText = "varchar(255)"
        const option3 = document.createElement('option')
        option3.setAttribute('value',"text")
        option3.innerText = "Text"
        const option4 = document.createElement('option')
        option4.setAttribute('value',"timestamp")
        option4.innerText = "datetime"

        select.append(options)
        select.append(option1)
        select.append(option2)
        select.append(option3)
        select.append(option4)
        div.append(input)
        div.append(select);
    

   })

function select(){



   
   let select = document.querySelector('#selects').value
   let tags = document.querySelector('#tags')


    $.ajax({
            method: 'POST',
            url: '/tableList',
            data: select,
            success: function (response) {
                console.log(response);
                let obj = JSON.parse(response);
                        let data = '<option value="">Select a Tables</option>'
                    for(let i=0;i<obj.length;i++){
                        data+='<option value='+obj[i]+'>'+obj[i]+'</option>'
                    }
                    tags.innerHTML = data;
            }
        })    

}

function columns(){
   let tags = document.querySelector('#tags').value
   let select = document.querySelector('#selects').value

//    console.log(select)

   let val;
   let value;
   let column =document.querySelector('#column')
   let type = document.querySelector('.type')
   $.ajax({
            method: 'POST',
            url: '/columnList',
            data: {"tags":tags,
                "select":select,
            },
            success: function (response) {
                let obj = JSON.parse(response);
                        let arr = [];
                        arr.push(obj)
                    for(let i=0;i<arr.length;i++){
                        val = Object.keys(arr[i])
                        value = Object.values(arr[i])
                    }
                    let data = ''
                    let datas= ''

                    for (let j = 0; j < val.length; j++) {
                    data+='<input type="text" name='+val[j]+' placeholder ='+val[j]+'> <input type="button" value ='+value[j]+'>'
                    }
                    column.innerHTML = data;

            }
        })
     
}

</script>

