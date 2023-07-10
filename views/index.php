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
</head>

<body>
        <div class="main">
<form action="/dbCreate" method="POST">
        <div>
    </div>
    <div>
        <label>Enter Your Database Name:</label>
        <input type="text" name="dbName" placeholder="Enter A Database name" >
    </div>
    <div><button type="submit" name="action" class="btn btn-primary">Create Database</button></div>
</form>
<form action="/list" method="post">
<div><button type="submit" name="action" class="btn btn-primary mt-2">Show Databases</button></div>
</form>
<form action="/createTable" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <!-- <form action="/dbTables" method="get"> -->
                        <select class="form-select" name="databaseName" onChange="select()" id="selects">
                            <option value="">Select a Database</option>
                            <?php foreach($details as $datas):?>
                             <option value="<?php echo $datas['Database'];?>"><?php echo $datas['Database'];?></option>
                            <?php endforeach;?>
                         </select>
                         <!-- </form> -->
                      </div>
                </div> 
                
        <div>
    </div>
    <div>
        <label>Enter Your Table Name:</label>
        <input type="text" name="tableName" placeholder="Enter A Table name" >
    </div>
    <div><button type="submit" class="btn btn-primary mt-2" name="action">Create Table</button></div>
</form>
                    <p>Selected Database Tables</p>:
                        <select class="" name="" id="tags">
                            <option value="">Select a Tables</option>
                             <option value="int">int</option>
                        </select>

<form action="/createColumns" method="post">
     <input type="text" placeholder="Add a columns" name="columnName">
                        <select class="" name="databaseName">
                            <option value="">Select a Data Type</option>
                             <option value="int">int</option>
                             <option value="varchar">varchar(255)</option>
                             <option value="Text">Text</option>
                             <option value="datetime">datetime</option>
                         </select>
                    <button class="btn btn-primary">Create A columns</button>
     <div class="div">
        </div> 
</form>
<button class="btn btn-primary column mt-2">Add a new column</button>
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
        input.setAttribute('name',"columnName")
        const select = document.createElement('select')
        select.setAttribute('name',"databaseName")
        const options = document.createElement('option')
        options.setAttribute('value',"")
        options.innerText = "Select a Data Type"
        const option1 = document.createElement('option')
        option1.setAttribute('value',"int")
        option1.innerText = "int"
        const option2 = document.createElement('option')
        option2.setAttribute('value',"varchar")
        option2.innerText = "varchar(255)"
        const option3 = document.createElement('option')
        option3.setAttribute('value',"Text")
        option3.innerText = "Text"
        const option4 = document.createElement('option')
        option4.setAttribute('value',"datetime")
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
   var availableTags = [];
   
   let select = document.querySelector('#selects').value
   let tags = document.querySelector('#tags')


    $.ajax({
            method: 'POST',
            url: '/tableList',
            data: select,
            success: function (response) {
               console.log(response)
            }
        })
   var response = $.ajax({
    type: "GET",   
    url: "/tableList",   
    async: false,
    success : function(res) {
        let obj = JSON.parse(res);

        let data = ''
           for(let i=0;i<obj.length;i++){

               console.log(obj[i][0])
               data+='<option value="int">'+obj[i][0]+'</option>'
           }
           tags.innerHTML = data;
        
    }
});

   


// let xhr = new XMLHttpRequest();
// xhr.open("GET",'http://localhost:9777/tableList',true)

// xhr.onreadystatechange = function (){
//     // console.log(xhr.readyState);
//     if(xhr.readyState === 4 && xhr.status === 200){
//         // let obj = JSON.parse(xhr.responseText);
//         // console.log(xhr.responseText)
//         // let data = ''
//         //    div.innerHTML = data;
//     }
// }
// xhr.send()

}
// console.log('#tags')

</script>

