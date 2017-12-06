<hmtl>
<head>
  <title>CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/validation.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>	
  <script src="js/validation.js"></script>
</head>
<body>
	 
<br>

<div class="container">
  <h2>CRUD Operation</h2>
  <br>
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
  	<li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#create">Create</a>
    </li>   
      <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#Update">Update</a>
      </li> -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#Delete">Delete</a>
    </li>
  </ul>  

  <!-- Tab panes -->
  <div class="tab-content">
  	<div id="create" class="container tab-pane active"><br>
      <div class="hide alert alert-danger alert-dismissible" id="myAlert">
        <a href="#" class="close">&times;</a>
        <strong>Field required!</strong>
      </div>
      <h3>Create</h3>
      <form action="/create" method="get" name="myForm" onsubmit="return validateForm()">
        <div class="container">
         	<div class="form-group">
        	  <label>ID</label>
  	   		  <input class="form-control numbersOnly" type="text"  name="id" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autofocus>
  	   	  </div>
  	   	  <div class="form-group">
  	   		  <label>Name</label>
  	   	   	<input  class="form-control" type="text" class="numbers" name="name">
  		    </div>
  		    <div class="form-group">
  	   		  <label>Email</label>
  	   		  <input  class="form-control" type="text" name="email">
     		  </div>
     		  <div class="form-group">
  	   		  <label>password</label>
  	   		  <input  class="form-control" type="password" name="password">
     		  </div>
     		  <div class="form-group">
  	   		  <button type="submit" class="btn btn-primary">create</button>
     		  </div>	
     		  {{csrf_field()}}
  	   </div>	   
	   </form>	 
    </div>    

    <!-- <div id="Update" class="container tab-pane fade"><br>
      <h3>Update</h3>
        <div class="col-md-2">
        <label>ID</label>
        <input type="text" name="id">

        <label>Name</label>
        <input type="text" name="">

        <label>Mobile</label>
        <input type="text" name="">

        <label>Sangli</label>
        <input type="text" name="">

        <input type="button" name="" value="Update">
        </div>
	   </div> -->

    <div id="Delete" class="container tab-pane fade"><br>
      <h3>Delete</h3>        
      <div class="container">
      <table class="table table-striped">
      <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>operation</th>
      </tr>
      </thead>
      <?php
        foreach ($data as $value) { 
        ?>
           <tbody>
              <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('delete.edit',$value->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['delete.destroy', $value->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}                    
                    {!! Form::close() !!}                  
                </td>
              </tr>                              
            </tbody>      
        <?php
        }
        ?>         
      </table>
   	  </form>
  	</div>
  </div>	    
</body>	
</hmtl>