<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminInmueblesController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
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
			$this->button_export = true;
			$this->table = "buildings";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Id","name"=>"id"];
			$this->col[] = ["label"=>"Fiscalia Distrito","name"=>"fiscalia_distrito","join"=>"fiscalias,nombre"];
			$this->col[] = ["label"=>"Tipo Inmueble","name"=>"tipo_inmueble"];
			$this->col[] = ["label"=>"Nombre","name"=>"nombre"];
			$this->col[] = ["label"=>"Alias","name"=>"alias"];
			$this->col[] = ["label"=>"Propietario","name"=>"proveedor_id","join"=>"proveedores,nombre"];
			$this->col[] = ["label"=>"Sup Terreno","name"=>"sup_terreno"];
			$this->col[] = ["label"=>"Sup Construccion","name"=>"sup_construccion"];
			$this->col[] = ["label"=>"Destino Areas","name"=>"destino_areas"];
			$this->col[] = ["label"=>"Uso","name"=>"uso"];
			$this->col[] = ["label"=>"Estatus","name"=>"estatus"];
			$this->col[] = ["label"=>"Domicilio","name"=>"domicilio"];
			$this->col[] = ["label"=>"Col","name"=>"col"];
			$this->col[] = ["label"=>"Cp","name"=>"cp"];
			$this->col[] = ["label"=>"Municipio","name"=>"municipio","join"=>"municipios,nombre"];
			$this->col[] = ["label"=>"Coord Latitud","name"=>"coord_latitud"];
			$this->col[] = ["label"=>"Coord Longitud","name"=>"coord_longitud"];
			$this->col[] = ["label"=>"Referencias","name"=>"referencias"];
			$this->col[] = ["label"=>"Telefono","name"=>"telefono"];
			$this->col[] = ["label"=>"Ext","name"=>"ext"];
			$this->col[] = ["label"=>"Celular","name"=>"celular"];
			$this->col[] = ["label"=>"Email","name"=>"email"];
			$this->col[] = ["label"=>"Observaciones","name"=>"observaciones"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			$row = CRUDBooster::first($this->table,$fiscalia_id);

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Fiscalía Distrito','name'=>'fiscalia_distrito','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'fiscalias,nombre'];
			$this->form[] = ['label'=>'Tipo Inmueble','name'=>'tipo_inmueble','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Arrendado;Comodato;Donación;Propio'];
			$this->form[] = ['label'=>'Nombre','name'=>'nombre','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Alias','name'=>'alias','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Propietario','name'=>'proveedor_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-9','datatable'=>'proveedores,nombre','datatable_format'=>'CONCAT(nombre,\' \',apellido_pat,\' \',apellido_mat)'];
			$this->form[] = ['label'=>'Num Finca','name'=>'num_finca','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sup Terreno','name'=>'sup_terreno','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Sup Construccion','name'=>'sup_construccion','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Uso','name'=>'uso','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Destino Areas','name'=>'destino_areas','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Estatus','name'=>'estatus','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Domicilio','name'=>'domicilio','type'=>'text','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Col','name'=>'col','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Cp','name'=>'cp','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Municipio','name'=>'municipio','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'municipios,nombre'];
			$this->form[] = ['label'=>'Coord Latitud','name'=>'coord_latitud','type'=>'number','validation'=>'double|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Coord Longitud','name'=>'coord_longitud','type'=>'number','validation'=>'min:1|max:255|double','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Referencias','name'=>'referencias','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Telefono','name'=>'telefono','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Ext','name'=>'ext','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Celular','name'=>'celular','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];
			$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'min:0|max:255|email|unique:buildings','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Observaciones','name'=>'observaciones','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Fiscalía Distrito','name'=>'fiscalia_distrito','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'fiscalias,nombre'];
			//$this->form[] = ['label'=>'Tipo Inmueble','name'=>'tipo_inmueble','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Arrendado;Comodato;Donación;Propio'];
			//$this->form[] = ['label'=>'Nombre','name'=>'nombre','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Alias','name'=>'alias','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Propietario','name'=>'proveedor_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-9','datatable'=>'proveedores,nombre','datatable_format'=>'(nombre,\' \',apellido_pat,\' \',apellido_mat)'];
			//$this->form[] = ['label'=>'Num Finca','name'=>'num_finca','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sup Terreno','name'=>'sup_terreno','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Sup Construccion','name'=>'sup_construccion','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Uso','name'=>'uso','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Destino Areas','name'=>'destino_areas','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Estatus','name'=>'estatus','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Domicilio','name'=>'domicilio','type'=>'text','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Col','name'=>'col','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Cp','name'=>'cp','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Municipio','name'=>'municipio','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'municipios,nombre'];
			//$this->form[] = ['label'=>'Coord Latitud','name'=>'coord_latitud','type'=>'number','validation'=>'double|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Coord Longitud','name'=>'coord_longitud','type'=>'number','validation'=>'min:1|max:255|double','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Referencias','name'=>'referencias','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Telefono','name'=>'telefono','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Ext','name'=>'ext','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Celular','name'=>'celular','type'=>'text','validation'=>'min:0|max:255','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];
			//$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'min:0|max:255|email|unique:buildings','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Observaciones','name'=>'observaciones','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
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
	        $this->script_js = null;


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
