@extends('sample')

@section('title')Главная страница@endsection

@section('content')

    <div id="MainPage">
        <v-app>
            <v-main>
                <v-row>
                    <v-col sm="4">
                        <h5 style="margin-left: 15px" class="text-primary"><p>Введите регион организации</p></h5>
                        <v-autocomplete
                            no-data-text="Нет данных для выбора"
                            solo
                            label="Введите регион организации"
                            v-model = "region"
                            :items = "selection_region"
                            clearable>
                        </v-autocomplete>
                        <h5 style="margin-left: 15px" class="text-primary"><p>Выберите уровень организации</p></h5>
                        <v-select
                            no-data-text="Нет данных для выбора"
                            solo
                            label="Выберите уровень организации"
                            v-model = "level"
                            :items = "selection_level"
                            clearable>
                        </v-select>
                    </v-col>
                </v-row>
                <v-btn
                    color="primary"
                    text
                    @click="ShowFilteredTable">
                    Отфильтровать
                </v-btn>
                <v-btn
                    color="red darken-1"
                    text
                    @click="ResetTable">
                    Сбросить фильтры
                </v-btn>
                <v-divider></v-divider>
                <v-card>
                    <v-card-text>
                        <v-text-field
                            v-model="search"
                            append-icon="mdi-magnify"
                            label="Search"
                            single-line
                            hide-details>
                        </v-text-field>
                        <v-divider></v-divider>
                        <v-data-table
                            v-model="selected"
                            :single-select="false"
                            item-key="idlistedu"
                            show-select
                            :headers="headers"
                            :items="show_tables_info"
                            class="elevation-1"
                            :search="search"
                            show-expand
                            :expanded.sync="expanded"
                            :single-expand="false">
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
                                    <b><h6>Расширенная информация об организации</h6></b>
                                    <v-btn
                                        @click = "ShowItems(item)">
                                        Показать филиалы
                                    </v-btn>
                                    <v-row>
                                        <v-col
                                            md="5">
                                            <v-card>
                                                <v-list dense>
                                                    <v-list-item>
                                                        <v-list-item-content>Код головной организации</v-list-item-content>
                                                            1
                                                        </v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код организации</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            2
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код ЦГЗГУ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            3
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код ГИВЦ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            4
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Номер по распоряжению</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            5
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            6
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Номер реестровой записи РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            7
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>ИНН</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            8
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>КПП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            9
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код главы по БК</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            10
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Наименование главы по БК</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            11
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Полное наименование по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            12
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Краткое наименование по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            13
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Аббревиатура</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            14
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Наименование для отчётов</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            15
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код статуса по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            16
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Статус по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            17
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код статуса организации по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            18
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Статус организации по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            19
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код уровня по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            20
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Уровень по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            21
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код региона организации по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            22
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Регион организации по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            23
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код региона головной организации по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            24
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Регион головной организации по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            25
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>ОКТМО по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            26
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Учредитель по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            27
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код основного ОКВЭД по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            28
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Наименование основного ОКВЭД по ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            29
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код типа организации по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            30
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Тип организации по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            31
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код типа учреждения по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            32
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Тип учреждения по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            33
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код уровня бюджета по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            34
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Уровень бюджета по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            35
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Код ОКФС по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            36
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Наименование ОКФС по РУБПНУБП</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            37
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Типизация</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            38
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Направленность</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            39
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Адрес</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            40
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Дата создания ЮЛ ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            41
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Дата прекращения деятельности ЮЛ ЕГРЮЛ</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            42
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
                        <v-card-actions>
                            <v-btn
                                block
                                depressed
                                class="transparent font-weight-bold grey--text pa-2 d-flex align-center"
                                icon @click="ShowDialogAdd"
                            >
                                <v-icon>
                                    mdi-plus
                                </v-icon>
                                <span>
                                Добавить запсиь
                            </span>
                            </v-btn>
                        </v-card-actions>
                        <v-btn
                            color="primary"
                            text
                            @click="PrintOutSelected()"
                        >Экспорт выбранных строк в файл
                        </v-btn>
                    </v-card-text>
                </v-card>

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
                    v-model="dialog_add"
                    width="700"
                >
                    <v-card>
                        <v-card-title class="text-h5 grey lighten-2">
                            Добавление данных
                        </v-card-title>
                        <v-divider></v-divider>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="red darken-1"
                                text
                                @click="dialog_add = false">
                                Отмена
                            </v-btn>
                            <v-btn
                                color="primary"
                                text
                                @click="">
                                Добавить
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
                    selection_region:[],
                    selection_level:[],
                    region:'',
                    level:'',
                    search: '',
                    kod_org: '',
                    level_org: '',
                    selected: [],
                    expanded: [],
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
                        { text: 'Наименование организации', value: 'name_human' },
                        { text: 'Уровень', value: 'level' },
                        { text: 'Регион организации', value: 'region' },
                        { text: 'Наименование основного ОКВЭД', value: 'okvedname' },
                        { text: 'Тип организации', value: 'orgtypename' },
                        { text: 'Тип учреждения', value: 'establishmentkindname' },
                        { text: 'Уровень бюджета', value: 'budgetlvlname' },
                        { text: 'Наименование ОКФС', value: 'okfs_name' },
                        { text: 'Типизация', value: 'org_type' },
                        { text: 'Направленность', value: 'id_napr' },
                        { text: 'Адрес', value: 'address' },
                        { text: 'Изменить/удалить', value: '_actions'},
                    ],
                }
            },
            methods:{
                ResetTable(){
                    this.show_tables_info = this.show_tables_info_
                },
                ShowSelectionRegion(){
                    let data = new FormData()
                    fetch('GetTableRegion',{
                        method:'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    })
                        .then((response)=>{
                            return response.json()
                        })
                        .then((data)=>{
                            this.selection_region = data.map(({ region }) => region)
                            this.selection_level = data.map(({ level }) => level)
                        })
                },
                ShowFilteredTable(){
                    this.show_tables_info = this.show_tables_info_
                    if (this.region){
                        this.show_tables_info = this.show_tables_info.filter(data => data.region == this.region)
                    }
                    if (this.level){
                        this.show_tables_info = this.show_tables_info.filter(data => data.level == this.level)
                    }
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
                this.ShowSelectionRegion();
            }
        })
    </script>

@endsection
