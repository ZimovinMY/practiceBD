@extends('sample')

@section('title')Главная страница@endsection

@section('content')

    <div id="MainPage">
        <v-app>
            <v-main>
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
                            <template v-slot:expanded-item="{ item }">
                                <td :colspan="headers.length">
                                    <v-divider></v-divider>
                                    <b><h6>Расширенная информация об организации</h6></b>
                                    <!-- More info about { item.human_name } -->
                                    <v-row>
                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                            lg="3">
                                            <v-card>
                                                <v-list dense>
                                                    <v-list-item>
                                                        <v-list-item-content>Calories:</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            1
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Fat:</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            2
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Carbs:</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            3
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Protein:</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            4
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Sodium:</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            5
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Calcium:</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            6
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Iron:</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            7
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                </v-list>
                                            </v-card>
                                        </v-col>
                                    </v-row>

                                    <br>
                                    <v-btn
                                        @click = "ShowItems(item)">
                                        Показать филиалы
                                    </v-btn>
                                    <v-divider></v-divider>
                                </td>
                            </template>

                        </v-data-table>
                        <v-card-actions>
                            <v-btn
                                block
                                depressed
                                class="transparent font-weight-bold grey--text pa-2 d-flex align-center"
                                icon @click="ShowDialogAdd()"
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
                    search: '',
                    selected: [],
                    expanded: [],
                    show_tables_info: [],
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
                            this.show_tables_info = data
                        })
                },
                ShowItems(item){
                    console.log(item.name_human)
                },
                ShowItem(item){
                    console.log(item.name_human)
                },
            },
            mounted: function (){//предзапуск функций
                this.ShowUnitedTable();
            }
        })
    </script>

@endsection
