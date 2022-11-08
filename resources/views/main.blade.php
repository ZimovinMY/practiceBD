@extends('sample')

@section('title')Главная страница@endsection

@section('content')
    <div id="MainPage">
        <v-app>
            <v-main>
                <div class="container ma-0">
                    <v-card>
                        <v-container>
                            <h5 class="text-primary ps-10 mb-2"><b>Фильтрация данных</b></h5>
                            <v-row>
                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-autocomplete
                                        no-data-text="Нет данных для выбора"
                                        outlined
                                        dense
                                        label="Введите код организации"
                                        v-model = "kod"
                                        :items = "selection_kod"
                                        clearable
                                        @change="ShowFilteredTable">
                                    </v-autocomplete>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-autocomplete
                                        no-data-text="Нет данных для выбора"
                                        outlined
                                        dense
                                        label="Введите наименование организации"
                                        v-model = "name_org"
                                        :items = "selection_name_org"
                                        clearable
                                        @change="ShowFilteredTable">
                                    </v-autocomplete>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-select
                                        no-data-text="Нет данных для выбора"
                                        outlined
                                        dense
                                        label="Выберите уровень организации"
                                        v-model = "level"
                                        :items = "selection_level"
                                        clearable
                                        @change="ShowFilteredTable">
                                    </v-select>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-autocomplete
                                        no-data-text="Нет данных для выбора"
                                        outlined
                                        dense
                                        label="Введите регион организации"
                                        v-model = "region"
                                        :items = "selection_region"
                                        clearable
                                        @change="ShowFilteredTable">
                                    </v-autocomplete>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-autocomplete
                                        no-data-text="Нет данных для выбора"
                                        outlined
                                        dense
                                        label="Введите основной ОКВЭД"
                                        v-model = "okved"
                                        :items = "selection_okved"
                                        clearable
                                        @change="ShowFilteredTable">
                                    </v-autocomplete>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-select
                                        no-data-text="Нет данных для выбора"
                                        outlined
                                        dense
                                        label="Выберите тип организации"
                                        v-model = "type_org"
                                        :items = "selection_type_org"
                                        clearable
                                        @change="ShowFilteredTable">
                                    </v-select>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-select
                                        no-data-text="Нет данных для выбора"
                                        outlined
                                        dense
                                        label="Выберите тип учреждения"
                                        v-model = "type_uchr"
                                        :items = "selection_type_uchr"
                                        clearable
                                        @change="ShowFilteredTable">
                                    </v-select>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-select
                                        no-data-text="Нет данных для выбора"
                                        outlined
                                        dense
                                        label="Выберите уровень бюджета"
                                        v-model = "budgetlvl"
                                        :items = "selection_budgetlvl"
                                        clearable
                                        @change="ShowFilteredTable">
                                    </v-select>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-select
                                        no-data-text="Нет данных для выбора"
                                        outlined
                                        dense
                                        label="Выберите типизацию"
                                        v-model = "type"
                                        :items = "selection_type"
                                        clearable
                                        @change="ShowFilteredTable">
                                    </v-select>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-select
                                        no-data-text="Нет данных для выбора"
                                        outlined
                                        dense
                                        label="Выберите направленность"
                                        v-model = "napr"
                                        :items = "selection_napr"
                                        clearable
                                        @change="ShowFilteredTable">
                                    </v-select>
                                </v-col>
                            </v-row>
                            <v-btn
                                color="red darken-1"
                                text
                                @click="ResetTable"
                            >
                                Сбросить фильтры
                            </v-btn>
                        </v-container>
                    </v-card>
                </div>


                        <v-divider></v-divider>
                        <v-data-table
                            v-model="selected"
                            :single-select="false"
                            item-key="idlistedu"
                            show-select
                            :headers="headers"
                            :items="show_tables_info"
                            class="elevation-1"
                            show-expand
                            :expanded.sync="expanded"
                            :single-expand="false"
                        >
                            <template v-slot:top>
                                <br>
                                <v-btn
                                    class="mx-5"
                                    color="primary"
                                    outlined
                                    onclick="location.href='export.php'"
                                >
                                    Экспортировать таблицу в файл
                                </v-btn>
                                <v-btn
                                    class="mx-5"
                                    color="primary"
                                    outlined
                                    onclick="location.href='export.php'"
                                >
                                    Экспортировать выбранные данные в файл
                                </v-btn>
                                <br>
                                <br>
                            </template>
                            <template
                                v-slot:item._actions="{ item }">
                                <v-row>
                                    <v-btn
                                        icon @click = "ShowDialogChange(item)">
                                        <v-icon>
                                            mdi-pencil
                                        </v-icon>
                                    </v-btn>
                                    <v-btn icon @click = "ShowDialogDelete(item)">
                                        <v-icon>
                                            mdi-delete
                                        </v-icon>
                                    </v-btn>
                                </v-row>

                            </template>
                            <template v-slot:expanded-item="{ headers, item }">
                                <td :colspan="headers.length">
                                    <v-divider></v-divider>
                                    <b><h5>Дополнительная информация об организации: @{{item.name_human}}</h5></b>
                                    <div v-if= "item.id_parent == item.idlistedu">
                                        <v-btn
                                            class="mt-5"
                                            color="primary"
                                            outlined
                                            @click = "ShowItems(item)">
                                            Показать филиалы
                                        </v-btn>
                                    </div>
                                    <v-row>
                                        <v-col
                                            md="5">
                                            <v-card>
                                                <v-list dense>
                                                    <v-list-item>
                                                        <v-list-item-content>Код головной организации</v-list-item-content>
                                                            @{{item.id_parent}}
                                                        </v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Наименование главы по БК</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.kbkname}}
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Полное наименование</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.name}}
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Сокращенное наименование</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.name_small}}
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>ИНН</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.inn}}
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>КПП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.kpp}}
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>ID субъекта РФ организации</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.id_region}}
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                </v-list>
                                            </v-card>
                                        </v-col>
                                    </v-row>
                                    <v-divider></v-divider>
                                </td>
                            </template>
                        </v-data-table>

                <v-dialog
                    v-model="dialog_delete"
                    max-width="500"
                >
                    <v-card>
                        <v-card-title class="text-h5 grey lighten-2">
                            Подтвердите удаление
                        </v-card-title>
                        <br>
                        <v-card-text>
                            Вся информация связанная с данной организацией будет удалена. Вы действительно хотите удалить организацию?
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>

                            <v-btn
                                color="red darken-1"
                                text
                                @click="dialog_delete = false"
                            >
                                Отмена
                            </v-btn>

                            <v-btn
                                color="primary"
                                text
                                @click="CheckBranch"
                            >
                                Удалить
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>


                <v-dialog
                    v-model="delete_branch"
                    max-width="500"
                >
                    <v-card>
                        <v-card-title class="text-h5 grey lighten-2">
                            Удалить филиалы организации?
                        </v-card-title>
                        <br>
                        <v-card-text>
                            Данная организация - головная. Хотите удалить ее филиалы?
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>

                            <v-btn
                                color="red darken-1"
                                text
                                @click="delete_branch = false"
                            >
                                Отмена
                            </v-btn>

                            <v-btn
                                color="primary"
                                text
                                @click="DeleteONE"
                            >
                                Нет
                            </v-btn>

                            <v-btn
                                color="primary"
                                text
                                @click="DeleteALL"
                            >
                                Да
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>

                <v-dialog
                    v-model="dialog_change"
                    width="700"
                >
                    <v-card>
                        <v-card-title class="text-h5 grey lighten-2">
                            Изменение данных
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="red darken-1"
                                text
                                @click="dialog_change = false">
                                Отмена
                            </v-btn>
                            <v-btn
                                color="primary"
                                text
                                @click="">
                                Изменить
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>

                <v-dialog
                    v-model="dialog_branches"
                >
                    <v-card>
                        <v-card-title class="text-h5 grey lighten-2">
                            @{{this.name_org_to_dialog}} имеет филиалы:
                        </v-card-title>
                        <br>
                            <v-data-table
                                item-key="idlistedu"
                                :headers="headers_branches"
                                :items="show_branches_tables_info"
                                class="elevation-1"
                            >
                            </v-data-table>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="red darken-1"
                                text
                                @click="dialog_branches = false">
                                Закрыть
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-main>
        </v-app>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        new Vue({
            el: '#MainPage',
            vuetify: new Vuetify(),
            data(){
                return{
                    name_org_to_dialog:'',
                    kod_gol:'',
                    dialog_branches: false,

                    selection_kod:[],
                    selection_name_org:[],
                    selection_region:[],
                    selection_level:[],
                    selection_okved:[],
                    selection_type_org:[],
                    selection_type_uchr:[],
                    selection_budgetlvl:[],
                    selection_type:[],
                    selection_napr:[],


                    kod:'',
                    name_org:'',
                    region:'',
                    level:'',
                    okved:'',
                    type_org:'',
                    type_uchr:'',
                    budgetlvl:'',
                    type:'',
                    napr:'',




                    kod_org: '',
                    level_org: '',
                    selected: [],
                    expanded: [],
                    show_branches_tables_info: [],
                    show_tables_info: [],
                    dialog_delete: false,
                    dialog_change: false,
                    dialog_add: false,
                    delete_branch: false,
                    headers: [
                        { text: '', value: 'data-table-expand' },
                        {
                            text: 'Код организации',
                            align: 'start',
                            value: 'idlistedu',
                        },
                        { text: 'Наименование организации', value: 'name_human', width: '200px'},
                        { text: 'Уровень', value: 'level' },
                        { text: 'Регион организации', value: 'region' },
                        { text: 'Наименование основного ОКВЭД', value: 'okvedname' },
                        { text: 'Тип организации', value: 'orgtypename' },
                        { text: 'Тип учреждения', value: 'establishmentkindname' },
                        { text: 'Уровень бюджета', value: 'budgetlvlname' },
                        { text: 'Типизация', value: 'org_type' },
                        { text: 'Направленность', value: 'id_napr' },
                        { text: 'Адрес', value: 'address' },
                        { text: 'Изменить/удалить', value: '_actions'},
                    ],
                    headers_branches: [
                        { text: '', value: 'data-table-expand' },
                        {
                            text: 'Код организации',
                            align: 'start',
                            value: 'idlistedu',
                        },
                        { text: 'Наименование организации', value: 'name_human', width: '200px'},
                        { text: 'Уровень', value: 'level' },
                        { text: 'Регион организации', value: 'region' },
                        { text: 'Наименование основного ОКВЭД', value: 'okvedname' },
                        { text: 'Тип организации', value: 'orgtypename' },
                        { text: 'Тип учреждения', value: 'establishmentkindname' },
                        { text: 'Уровень бюджета', value: 'budgetlvlname' },
                        { text: 'Типизация', value: 'org_type' },
                        { text: 'Направленность', value: 'id_napr' },
                        { text: 'Адрес', value: 'address' },
                    ],
                }
            },
            methods:{
                ExportTable(){
                    //
                },
                ExportSelected(){
                    //
                },
                FillBranchesTable(){
                    this.show_branches_tables_info = this.show_tables_info_.filter(data => data.id_parent == this.kod_gol && data.idlistedu != this.kod_gol)
                },
                ShowItems(item){
                    this.kod_gol = item.idlistedu
                    this.name_org_to_dialog = item.name_human
                    this.FillBranchesTable()
                    this.dialog_branches = true
                },
                ResetTable(){
                    this.show_tables_info = this.show_tables_info_
                    this.ChangeSelection()
                    this.kod=''
                    this.name_org=''
                    this.region=''
                    this.level=''
                    this.okved=''
                    this.type_org=''
                    this.type_uchr=''
                    this.budgetlvl=''
                    this.type=''
                    this.napr=''
                },
                ShowSelection(){
                    let data = new FormData()
                    fetch('GetTableData',{
                        method:'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    })
                        .then((response)=>{
                            return response.json()
                        })
                        .then((data)=>{
                            this.selection_kod = data.map(({ idlistedu }) => idlistedu)
                            this.selection_name_org = data.map(({ name_human }) => name_human)
                            this.selection_region = data.map(({ region }) => region)
                            this.selection_level = data.map(({ level }) => level)
                            this.selection_okved = data.map(({ okvedname }) => okvedname)
                            this.selection_type_org = data.map(({ orgtypename }) => orgtypename)
                            this.selection_type_uchr = data.map(({ establishmentkindname }) => establishmentkindname)
                            this.selection_budgetlvl = data.map(({ budgetlvlname }) => budgetlvlname)
                            this.selection_type = data.map(({ org_type }) => org_type)
                            this.selection_napr = data.map(({ id_napr }) => id_napr)
                        })
                },
                ChangeSelection(){
                    this.selection_kod = this.show_tables_info.map(({ idlistedu }) => idlistedu)
                    this.selection_name_org = this.show_tables_info.map(({ name_human }) => name_human)
                    this.selection_region = this.show_tables_info.map(({ region }) => region)
                    this.selection_level = this.show_tables_info.map(({ level }) => level)
                    this.selection_okved = this.show_tables_info.map(({ okvedname }) => okvedname)
                    this.selection_type_org = this.show_tables_info.map(({ orgtypename }) => orgtypename)
                    this.selection_type_uchr = this.show_tables_info.map(({ establishmentkindname }) => establishmentkindname)
                    this.selection_budgetlvl = this.show_tables_info.map(({ budgetlvlname }) => budgetlvlname)
                    this.selection_type = this.show_tables_info.map(({ org_type }) => org_type)
                    this.selection_napr = this.show_tables_info.map(({ id_napr }) => id_napr)
                },
                ShowFilteredTable(){
                    this.show_tables_info = this.show_tables_info_
                    if (this.kod){
                        this.show_tables_info = this.show_tables_info.filter(data => data.idlistedu == this.kod)
                    }
                    if (this.name_org){
                        this.show_tables_info = this.show_tables_info.filter(data => data.name_human == this.name_org)
                    }
                    if (this.region){
                        this.show_tables_info = this.show_tables_info.filter(data => data.region == this.region)
                    }
                    if (this.level){
                        this.show_tables_info = this.show_tables_info.filter(data => data.level == this.level)
                    }
                    if (this.okved){
                        this.show_tables_info = this.show_tables_info.filter(data => data.okvedname == this.okved)
                    }
                    if (this.type_org){
                        this.show_tables_info = this.show_tables_info.filter(data => data.orgtypename == this.type_org)
                    }
                    if (this.type_uchr){
                        this.show_tables_info = this.show_tables_info.filter(data => data.establishmentkindname == this.type_uchr)
                    }
                    if (this.budgetlvl){
                        this.show_tables_info = this.show_tables_info.filter(data => data.budgetlvlname == this.budgetlvl)
                    }
                    if (this.type){
                        this.show_tables_info = this.show_tables_info.filter(data => data.org_type == this.type)
                    }
                    if (this.napr){
                        this.show_tables_info = this.show_tables_info.filter(data => data.id_napr == this.napr)
                    }
                    this.ChangeSelection()
                },
                async ShowUnitedTable(){//Запрос на данные из таблиц
                    this.show_tables_info_ = []
                    await fetch('ShowUnitedTable',{
                        method: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    })
                        .then((response)=>{
                            return response.json()
                        })
                        .then((data)=>{
                            this.show_tables_info_ = data
                            this.show_tables_info = this.show_tables_info_
                        })
                },
                ShowDialogAdd(){
                    //присвоение переменным
                    this.dialog_add=true
                },
                ShowDialogDelete(item){//диалог на удаление
                    this.kod_org=item.idlistedu
                    this.level_org=item.level
                    this.dialog_delete=true
                },
                ShowDialogChange(item){//диалог на изменение
                    //присвоение переменным
                    this.dialog_change=true
                },
                CheckBranch(){
                    if (this.level_org == 'Головное'){
                        this.delete_branch=true
                    }
                    else{
                        this.DeleteONE();
                    }
                },
                async DeleteONE(){
                    let data=new FormData()
                    data.append('kod_org',this.kod_org)
                     await fetch('DeleteDataONE',{
                        method:'post',
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        body:data
                    })
                    this.delete_branch=false;
                    this.dialog_delete=false;
                    this.ShowUnitedTable();
                },
                async DeleteALL(){
                    let data=new FormData()
                    data.append('kod_org',this.kod_org)
                    await fetch('DeleteDataALL',{
                        method:'post',
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        body:data
                    })
                    this.delete_branch=false;
                    this.dialog_delete=false;
                    this.ShowUnitedTable();
                },
            },
            mounted: function (){//предзапуск функций
                this.ShowUnitedTable();
                this.ShowSelection();
            }
        })
    </script>

@endsection
