<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminInputPenyediaController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "input_penyedia";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "input_penyedia";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Kode Rekening","name"=>"rek_id","join"=>"db_lra,kode_rek"];
			$this->col[] = ["label"=>"Program","name"=>"program_id","join"=>"nama_program,nama_program"];
			$this->col[] = ["label"=>"Kegiatan","name"=>"kegiatan_id","join"=>"db_lra,nama_kegiatan"];
			$this->col[] = ["label"=>"No Spk","name"=>"no_spk"];
			$this->col[] = ["label"=>"Nama Perusahaan","name"=>"nama_perusahaan"];
			$this->col[] = ["label"=>"Bulan","name"=>"bulan"];
			$this->col[] = ["label"=>"Anggaran","name"=>"anggaran","join"=>"db_lra,anggaran"];
			$this->col[] = ["label"=>"Kecamatan","name"=>"kecamatan_id","join"=>"nama_kec,kecamatan"];
			$this->col[] = ["label"=>"Desa Id","name"=>"desa_id","join"=>"nama_desa,desa"];
			$this->col[] = ["label"=>"Jenis Pengadaan","name"=>"jenis_pengadaan"];
			# END COLUM Necho CRUDBooster::myId()S LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nama Program','name'=>'program_id','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'nama_program,nama_program'];
			$this->form[] = ['label'=>'Nama Kegiatan','name'=>'kegiatan_id','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'db_lra,nama_kegiatan','parent_select'=>'program_id'];
			$this->form[] = ['label'=>'Kode Rekening','name'=>'rek_id','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'db_lra,kode_rek','parent_select'=>'kegiatan_id'];
			$this->form[] = ['label'=>'No Spk','name'=>'no_spk','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nama Perusahaan','name'=>'nama_perusahaan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Bulan','name'=>'bulan','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Anggaran','name'=>'anggaran','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'db_lra,anggaran','parent_select'=>'kegiatan_id'];
			$this->form[] = ['label'=>'Realisasi Fisik','name'=>'realisasi_fisik','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'%'];
			$this->form[] = ['label'=>'Realisasi Keuangan','name'=>'realisasi_keuangan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'User Id','name'=>'user_id','type'=>'hidden','validation'=>'required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Kecamatan','name'=>'kecamatan_id','type'=>'select','validation'=>'required','width'=>'col-sm-9','datatable'=>'nama_kec,kecamatan'];
			$this->form[] = ['label'=>'Desa','name'=>'desa_id','type'=>'select','validation'=>'required','width'=>'col-sm-9','datatable'=>'nama_desa,desa','parent_select'=>'kecamatan_id'];
			$this->form[] = ['label'=>'Jenis Pengadaan','name'=>'jenis_pengadaan','type'=>'select','validation'=>'required','width'=>'col-sm-9','dataenum'=>'Barang;Jasa'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Nama Program','name'=>'program_id','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'nama_program,nama_program'];
			//$this->form[] = ['label'=>'Nama Kegiatan','name'=>'id','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'db_lra,nama_kegiatan','parent_select'=>'kegiatan_id'];
			//$this->form[] = ['label'=>'Kode Rekening','name'=>'rek_id','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'db_lra,kode_rek','parent_select'=>'id'];
			//$this->form[] = ['label'=>'No Spk','name'=>'no_spk','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nama Perusahaan','name'=>'nama_perusahaan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Bulan','name'=>'bulan','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Anggaran','name'=>'anggaran','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'db_lra,anggaran','parent_select'=>'id'];
			//$this->form[] = ['label'=>'Realisasi Fisik','name'=>'realisasi_fisik','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','placeholder'=>'%'];
			//$this->form[] = ['label'=>'Realisasi Keuangan','name'=>'realisasi_keuangan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'User Id','name'=>'user_id','type'=>'hidden','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Kecamatan','name'=>'kecamatan_id','type'=>'select','validation'=>'required','width'=>'col-sm-9','datatable'=>'nama_kec,kecamatan'];
			//$this->form[] = ['label'=>'Desa','name'=>'desa_id','type'=>'select','validation'=>'required','width'=>'col-sm-9','datatable'=>'nama_desa,desa','parent_select'=>'kecamatan_id'];
			//$this->form[] = ['label'=>'Jenis Pengadaan','name'=>'jenis_pengadaan','type'=>'select','validation'=>'required','width'=>'col-sm-9','dataenum'=>'Barang;Jasa'];
			# OLD END FORM

			/*
	        | ----------------------------------------------------------------------
	        | Sub Module
	        | ----------------------------------------------------------------------
			| @label          = Label of action
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        |
	        */
	        $this->sub_module = array();


	        /*
	        | ----------------------------------------------------------------------
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------
	        | @label       = Label of action
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        |
	        */
	        $this->addaction = array();


	        /*
	        | ----------------------------------------------------------------------
	        | Add More Button Selected
	        | ----------------------------------------------------------------------
	        | @label       = Label of action
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button
	        | Then about the action, you should code at actionButtonSelected method
	        |
	        */
	        $this->button_selected = array();


	        /*
	        | ----------------------------------------------------------------------
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------
	        | @message = Text of message
	        | @type    = warning,success,danger,info
	        |
	        */
	        $this->alert        = array();



	        /*
	        | ----------------------------------------------------------------------
	        | Add more button to header button
	        | ----------------------------------------------------------------------
	        | @label = Name of button
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        |
	        */
	        $this->index_button = array();



	        /*
	        | ----------------------------------------------------------------------
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.
	        |
	        */
	        $this->table_row_color = array();


	        /*
	        | ----------------------------------------------------------------------
	        | You may use this bellow array to add statistic at dashboard
	        | ----------------------------------------------------------------------
	        | @label, @count, @icon, @color
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ----------------------------------------------------------------------
	        | Add javascript at body
	        | ----------------------------------------------------------------------
	        | javascript code in the variable
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ----------------------------------------------------------------------
	        | Include HTML Code before index table
	        | ----------------------------------------------------------------------
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;



	        /*
	        | ----------------------------------------------------------------------
	        | Include HTML Code after index table
	        | ----------------------------------------------------------------------
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;



	        /*
	        | ----------------------------------------------------------------------
	        | Include Javascript File
	        | ----------------------------------------------------------------------
	        | URL of your javascript each array
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();



	        /*
	        | ----------------------------------------------------------------------
	        | Add css style at body
	        | ----------------------------------------------------------------------
	        | css code in the variable
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;



	        /*
	        | ----------------------------------------------------------------------
	        | Include css File
	        | ----------------------------------------------------------------------
	        | URL of your css each array
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();


	    }


	    /*
	    | ----------------------------------------------------------------------
	    | Hook for button selected
	    | ----------------------------------------------------------------------
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here

	    }


	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate query of index result
	    | ----------------------------------------------------------------------
	    | @query = current sql query
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
					if(!CRUDBooster::isSuperadmin()) {
					$query->where('user_id',CRUDBooster::myId());
					}
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate row of index table html
	    | ----------------------------------------------------------------------
	    |
	    */
	    public function hook_row_index($column_index,&$column_value) {
	    	//Your code here
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate data input before add data is execute
	    | ----------------------------------------------------------------------
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after add public static function called
	    | ----------------------------------------------------------------------
	    | @id = last insert id
	    |
	    */
	    public function hook_after_add($id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate data input before update data is execute
	    | ----------------------------------------------------------------------
	    | @postdata = input post data
	    | @id       = current id
	    |
	    */
	    public function hook_before_edit(&$postdata,$id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_edit($id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :)


	}