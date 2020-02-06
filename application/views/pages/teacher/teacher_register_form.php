<div class="container" style="padding: 10px">
  
  <div class="card" style="padding: 9px">

    <div class="row">
    <div class="col-md-6">
      <h3>Teacher Form</h3>
    </div>

    <div class="col-md-6" align="right">
      <span><a href="teacher_table"><input type="submit" class="btn btn-success" name="back" value="Back"></input></a></span>
    </div>
    </div>

  </div>

  <div style="padding: 9px"></div>



<body>

<div class="card">
<div class="container" style="padding: 20px">
    <form name="form" id="form" method="post" class="container" action="<?php echo base_url('admin/save_teacher');?>">
      <div class="row">
          <div class="col-sm-6">
              <div class="form-group">
                <label for="name">ID</label>
                <input type="text" name="id" value="" id="id" class="form-control required" placeholder="Teacher ID" >
                <span id="iderror" class="text-danger"></span>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="" id="name" class="form-control required" placeholder="Teacher Name" >
                <span id="nameerror"></span>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-6">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="" id="username" class="form-control required" placeholder="Username" >
                <span id="iderror" class="text-danger"></span>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" value="" id="password" class="form-control required" placeholder="Password" >
                <span id="nameerror"></span>
              </div>
          </div>
      </div>
      <div class="form-group">
        <label for="gender">Gender</label><br>
          <div class="form-check">
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female
            <span id="countryerror"></span>
          </div>
      </div>

      <div class="form-group">
        <label for="academic">Academic Year</label>
        <select name="academic" id="academic" style="width: 50%" class="form-control">
          <option value="">Select Year</option>
          <?php foreach($academic as $row){ ?>
          <option value="<?php echo $row->academic_id;?>"><?php echo $row->academic_name;?></option>
        <?php } ?>
        </select>
      </div>
<?php if($this->session->userdata('user')==='admin'){?>
      <div class="form-group">
        <label for="college">College</label>
        <select name="college" id="college" style="width: 50%" class="form-control">
          <option value="">Select College</option>
          <?php foreach($college as $row){ ?>
          <option value="<?php echo $row->id;?>"><?php echo $row->college_name;?></option>
        <?php } ?>
        </select>
      </div>
    <?php } ?>

      
      <div class="form-group">
        <label for="course" style="width: 100px">Course</label>
        <select name="course" id="course" style="width: 50%" 300px" class="form-control">
          <option value="">Select Course</option>
          <?php foreach($course as $row){ ?>
          <option value="<?php echo $row->id;?>"><?php echo $row->course_name;?></option>
          <?php } ?>
        </select>
      </div>    
      <div class="input-group">
          
          <button type="submit" class="btn btn-primary" name="save">Save</button>
          
      </div>
        
    </form>

    </div>
</div>
</div>
</body>


<script type="text/javascript">
  
  $(document).ready(function()
  {

    $('#college').change(function()
    {
      var college_id = $('#college').val();
      if(college_id!='')
      {
        $.ajax({

          url: "<?php echo base_url('admin/fetch_course');?>",
          method: "POST",
          data: {college_id:college_id},
          success:function(data)
          {
            $('#course').html(data);
          }
        });
      }
    });


    $("#id").keyup(function()
    {
      var id = $('#id').val();
      
      if(id!='')
      {
        $.ajax({

          url: "<?php echo base_url('admin/check_id');?>",
          method: "POST",
          data: {id:id,action:"teacher"},
          success:function(data)
          {
            $('#iderror').html(data);
          }
        });
      }
      else
      {
          $('#iderror').text("**Required");
      }

    });

    $('#id-error').css('color','red');


    $("#form").validate(
      {
       rules:{
        id: {
          required:true
        },
        name:{
          required:true
        },
        username: {
          required:true
        },
        password:{
          required:true
        },
        academic:{
          required:true
        },
        college: {
          required:true
        },
        course:{
          required:true
        }

       },
       messages:{
        id:"haiii",
        name:"",
        username:"",
       }
      });

    
  });

</script>