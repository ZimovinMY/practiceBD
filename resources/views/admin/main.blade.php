@extends('admin.sample_admin')

@section('title')
    Главная страница
@endsection

@section('content')
    <div id="MainPage">
        <v-app>
            <v-main>
                <div class="container" style="max-width: 1650px">
                    <v-card>
                        <v-container style="max-width: 1600px">
                            <h5 class="text-primary ps-10 mb-3"><b>Фильтрация данных</b></h5>
                            <v-row>
                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-select
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="Уровень организации"
                                        v-model="level"
                                        :items="selection_level"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
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
                                        dense
                                        label="Код региона организации"
                                        v-model="kod_region"
                                        :items="selection_kod_region"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
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
                                        dense
                                        label="Регион организации"
                                        v-model="region"
                                        :items="selection_region"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
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
                                        dense
                                        label="Код главы по БК"
                                        v-model="code_kbk"
                                        :items="selection_code_kbk"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
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
                                        dense
                                        label="Наименование главы по БК"
                                        v-model="kbk"
                                        :items="selection_kbk"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
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
                                        dense
                                        label="Тип учреждения"
                                        v-model="type_uchr"
                                        :items="selection_type_uchr"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
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
                                        dense
                                        label="Типизация"
                                        v-model="type"
                                        :items="selection_type"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
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
                                        dense
                                        label="Направленность"
                                        v-model="napr"
                                        :items="selection_napr"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
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
                                        dense
                                        label="Тип организации"
                                        v-model="type_org"
                                        :items="selection_type_org"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
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
                                        dense
                                        label="Уровень бюджета"
                                        v-model="budgetlvl"
                                        :items="selection_budgetlvl"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-select>
                                </v-col>
                            </v-row>
                            <v-btn
                                color="red darken-1"
                                small
                                outlined
                                @click="ResetTable"
                                class="mt-6 ml-2 mb-1"
                            >
                                Сбросить фильтры
                            </v-btn>
                        </v-container>
                    </v-card>
                </div>
                <v-data-table
                    v-model="selected"
                    :single-select="false"
                    item-key="idlistedu"
                    show-select
                    :headers="headers"
                    :items="show_tables_info"
                    class="elevation-1"
                    :expanded.sync="expanded"
                    :single-expand="false"
                    @click:row="(item, slot) => OpenInfo(item,slot)"
                >
                    <template v-slot:top>
                        <br>
                        <v-btn
                            class="ml-7"
                            color="primary"
                            outlined
                            @click="ExportTableReport"
                            small
                        >
                            Экспортировать таблицу в файл
                        </v-btn>
                        <v-btn
                            class="ml-7"
                            color="primary"
                            outlined
                            @click="ExportSelectedReport"
                            small
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
                                icon @click="ShowDialogChange(item)">
                                <v-icon>
                                    mdi-pencil
                                </v-icon>
                            </v-btn>
                            <v-btn icon @click="ShowDialogDelete(item)">
                                <v-icon>
                                    mdi-delete
                                </v-icon>
                            </v-btn>
                        </v-row>
                    </template>
                    <template v-slot:expanded-item="{ item, headers }">
                        <td :colspan="headers.length">
                            <div class="mt-5 ml-5">
                                <b><h5>Дополнительная информация об организации: @{{item.name_human}}</h5></b>
                            </div>
                            <div v-if="item.id_parent == item.idlistedu">

                                <v-row>
                                    <v-col
                                        cols="12"
                                        md="8"
                                    >
                                        <div class="ml-2">
                                            <b><h6>Филиалы организации:</h6></b>
                                        </div>
                                        <v-textarea
                                            v-model="branches_name"
                                            label="Филиалы организации"
                                            solo
                                            color="teal"
                                            auto-grow
                                            readonly
                                            rows="1"
                                        >
                                        </v-textarea>
                                    </v-col>
                                </v-row>
                                <v-btn
                                    class="mb-2"
                                    color="primary"
                                    outlined
                                    @click="ShowItems(item)"
                                    small>
                                    Показать дополнительную информацию о филиалах
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
                                                <v-list-item-content>Наименование главы по БК</v-list-item-content>
                                                <v-list-item-content class="align-end">
                                                    @{{item.kbkname}}
                                                </v-list-item-content>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-content>ID субъекта РФ организации</v-list-item-content>
                                                <v-list-item-content class="align-end">
                                                    @{{item.id_region}}
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
                                                <v-list-item-content>Тип организации</v-list-item-content>
                                                <v-list-item-content class="align-end">
                                                    @{{item.orgtypename}}
                                                </v-list-item-content>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-content>Уровень бюджета</v-list-item-content>
                                                <v-list-item-content class="align-end">
                                                    @{{item.budgetlvlname}}
                                                </v-list-item-content>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-content>Адрес</v-list-item-content>
                                                <v-list-item-content class="align-end">
                                                    @{{item.address}}
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list>
                                    </v-card>
                                </v-col>
                            </v-row>
                            <br>
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
                            Вся информация связанная с данной организацией будет удалена. Вы действительно хотите
                            продолжить?
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
                    width="800"
                >
                    <v-card>
                        <v-card-title class="text-h5 grey lighten-2">
                            Изменение данных
                        </v-card-title>
                        <v-card-text>
                            <v-form ref="form">
                                <v-container>
                                    <v-row>
                                        <v-col
                                            cols="12"
                                            sm="4"
                                        >
                                            <v-autocomplete
                                                v-model="dialog_id_parent"
                                                :items="selection_id_parent_changing"
                                                label="Код головной организации"
                                                class="ma-0 pa-0"
                                                clearable
                                                :rules="[() => !!dialog_id_parent || 'Поле должно быть заполнено!']"
                                                required
                                            >
                                            </v-autocomplete>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="8"
                                        >
                                            <v-text-field
                                                v-model="dialog_name_human"
                                                label="Наименование организации"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_name_human || 'Поле должно быть заполнено!']"
                                                required>
                                            </v-text-field>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                        >
                                            <v-textarea
                                                v-model="dialog_name"
                                                label="Полное наименование"
                                                color="teal"
                                                class="ma-0 pa-0"
                                                auto-grow
                                                rows="1"
                                                :rules="[() => !!dialog_name || 'Поле должно быть заполнено!']"
                                                required
                                            >
                                            </v-textarea>
                                        </v-col>
                                        <v-col
                                            cols="12"
                                        >
                                            <v-text-field
                                                v-model="dialog_name_small"
                                                label="Сокращенное наименование"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_name_small || 'Поле должно быть заполнено!']"
                                                required>
                                            </v-text-field>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="4"
                                        >
                                            <v-autocomplete
                                                v-model="dialog_id_region"
                                                :items="selection_kod_region_changing"
                                                label="ID субъекта РФ организации"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_id_region || 'Поле должно быть заполнено!']"
                                                required
                                                clearable
                                                @change="ChangeFieldNameRegion">
                                            </v-autocomplete>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="8"
                                        >
                                            <v-autocomplete
                                                v-model="dialog_region"
                                                :items="selection_region_changing"
                                                label="Регион организации"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_region || 'Поле должно быть заполнено!']"
                                                required
                                                clearable
                                                @change="ChangeFieldIdRegion">
                                            </v-autocomplete>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="4"
                                        >
                                            <v-autocomplete
                                                v-model="dialog_kbkcode"
                                                :items="selection_code_kbk_changing"
                                                label="Код главы по БК"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_kbkcode || 'Поле должно быть заполнено!']"
                                                required
                                                clearable
                                                @change="ChangeFieldNameKBK">
                                            </v-autocomplete>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="8"
                                        >
                                            <v-autocomplete
                                                v-model="dialog_kbkname"
                                                :items="selection_kbk_changing"
                                                label="Наименование главы по БК"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_kbkname || 'Поле должно быть заполнено!']"
                                                required
                                                clearable
                                                @change="ChangeFieldIdKBK">
                                            </v-autocomplete>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-select
                                                v-model="dialog_establishmentkindname"
                                                :items="selection_type_uchr_changing"
                                                label="Тип учреждения"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_establishmentkindname || 'Поле должно быть заполнено!']"
                                                required>
                                            </v-select>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-select
                                                v-model="dialog_org_type"
                                                :items="selection_type_changing"
                                                label="Типизация"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_org_type || 'Поле должно быть заполнено!']"
                                                required>
                                            </v-select>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-select
                                                v-model="dialog_level"
                                                :items="selection_level_changing"
                                                label="Уровень"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_level || 'Поле должно быть заполнено!']"
                                                required>
                                            </v-select>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-select
                                                v-model="dialog_id_napr"
                                                :items="selection_napr_changing"
                                                label="Направленность"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_id_napr || 'Поле должно быть заполнено!']"
                                                required>
                                            </v-select>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-select
                                                v-model="dialog_orgtypename"
                                                :items="selection_type_org_changing"
                                                label="Тип организации"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_orgtypename || 'Поле должно быть заполнено!']"
                                                required>
                                            </v-select>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="6"
                                            md="4"
                                        >
                                            <v-select
                                                v-model="dialog_budgetlvlname"
                                                :items="selection_budgetlvl_changing"
                                                label="Уровень бюджета"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_budgetlvlname || 'Поле должно быть заполнено!']"
                                                required>
                                            </v-select>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="6"
                                        >
                                            <v-text-field
                                                v-model="dialog_inn"
                                                label="ИНН"
                                                class="ma-0 pa-0"
                                                :rules="inn_kpp_rules"
                                                required>
                                            </v-text-field>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                            sm="6"
                                        >
                                            <v-text-field
                                                v-model="dialog_kpp"
                                                label="КПП"
                                                class="ma-0 pa-0"
                                                :rules="inn_kpp_rules"
                                                required>
                                            </v-text-field>
                                        </v-col>

                                        <v-col
                                            cols="12"
                                        >
                                            <v-text-field
                                                v-model="dialog_address"
                                                label="Адрес"
                                                class="ma-0 pa-0"
                                                :rules="[() => !!dialog_address || 'Поле должно быть заполнено!']"
                                                required>
                                            </v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-form>
                        </v-card-text>
                        <v-card-actions class="mr-3 pa-0">
                            <v-spacer></v-spacer>
                            <v-btn
                                color="red darken-1"
                                text
                                @click="dialog_change = false"
                                class="mb-2">
                                Отмена
                            </v-btn>
                            <v-btn
                                color="primary"
                                text
                                @click="ChangeData"
                                class="mb-2">
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
                            v-model="selected_branches"
                            :single-select="false"
                            item-key="idlistedu"
                            show-select
                            :expanded.sync="expanded_branches"
                            :single-expand="false"
                            @click:row="(item, slot) => OpenInfo(item,slot)"
                        >
                            <template v-slot:top>

                                <v-btn
                                    class="ml-7"
                                    color="primary"
                                    outlined
                                    @click="ExportBranchTableReport"
                                    small
                                >
                                    Экспортировать таблицу в файл
                                </v-btn>
                                <v-btn
                                    class="ml-7"
                                    color="primary"
                                    outlined
                                    @click="ExportBranchSelectedReport"
                                    small
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
                                        icon @click="ShowDialogChange(item)">
                                        <v-icon>
                                            mdi-pencil
                                        </v-icon>
                                    </v-btn>
                                    <v-btn icon @click="ShowDialogDelete(item)">
                                        <v-icon>
                                            mdi-delete
                                        </v-icon>
                                    </v-btn>
                                </v-row>

                            </template>
                            <template v-slot:expanded-item="{ headers, item }">
                                <td :colspan="headers.length">
                                    <div class="mt-5 ml-5">
                                        <b><h5>Дополнительная информация об организации: @{{item.name_human}}</h5></b>
                                    </div>
                                    <v-row>
                                        <v-col
                                            md="5">
                                            <v-card>
                                                <v-list dense>
                                                    <v-list-item>
                                                        <v-list-item-content>Код головной организации
                                                        </v-list-item-content>
                                                        @{{item.id_parent}}
                                                        </v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Полное наименование</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.name}}
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Сокращенное наименование
                                                        </v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.name_small}}
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Наименование главы по БК
                                                        </v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.kbkname}}
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>ID субъекта РФ организации
                                                        </v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.id_region}}
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
                                                        <v-list-item-content>Тип организации</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.orgtypename}}
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Уровень бюджета</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.budgetlvlname}}
                                                        </v-list-item-content>
                                                    </v-list-item>

                                                    <v-list-item>
                                                        <v-list-item-content>Адрес</v-list-item-content>
                                                        <v-list-item-content class="align-end">
                                                            @{{item.address}}
                                                        </v-list-item-content>
                                                    </v-list-item>
                                                </v-list>
                                            </v-card>
                                        </v-col>
                                    </v-row>
                                    <br>
                                </td>
                            </template>
                        </v-data-table>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="red darken-1"
                                outlined
                                small
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
            data() {
                return {
                    show_dialog: false,
                    branches_name: [],
                    id: '',

                    slovar: [],
                    slovar1: [],
                    inn_kpp_rules: [
                        v => (!v || Number(v)) || 'Поле должно содержать только числа!',
                        v => !!v || 'Поле должно быть заполнено!',
                    ],
                    dialog_id_parent: '',
                    dialog_name_human: '',
                    dialog_name: '',
                    dialog_name_small: '',
                    dialog_id_region: '',
                    dialog_region: '',
                    dialog_kbkcode: '',
                    dialog_kbkname: '',
                    dialog_establishmentkindname: '',
                    dialog_org_type: '',
                    dialog_level: '',
                    dialog_id_napr: '',
                    dialog_orgtypename: '',
                    dialog_budgetlvlname: '',
                    dialog_inn: '',
                    dialog_kpp: '',
                    dialog_address: '',

                    selection_id_parent_changing: [],
                    selection_kod_region_changing: [],
                    selection_region_changing: [],
                    selection_code_kbk_changing: [],
                    selection_kbk_changing: [],
                    selection_type_uchr_changing: [],
                    selection_type_changing: [],
                    selection_level_changing: [],
                    selection_napr_changing: [],
                    selection_type_org_changing: [],
                    selection_budgetlvl_changing: [],

                    name_org_to_dialog: '',
                    kod_gol: '',
                    dialog_branches: false,

                    selection_level: [],
                    selection_kod_region: [],
                    selection_region: [],
                    selection_code_kbk: [],
                    selection_kbk: [],
                    selection_type_uchr: [],
                    selection_type: [],
                    selection_napr: [],
                    selection_type_org: [],
                    selection_budgetlvl: [],

                    level: '',
                    kod_region: '',
                    region: '',
                    code_kbk: '',
                    kbk: '',
                    type_uchr: '',
                    type: '',
                    napr: '',
                    type_org: '',
                    budgetlvl: '',

                    kod_org: '',
                    level_org: '',
                    selected: [],
                    selected_branches: [],
                    expanded: [],
                    expanded_branches: [],
                    show_branches_tables_info: [],
                    show_tables_info: [],
                    dialog_delete: false,
                    dialog_change: false,
                    dialog_add: false,
                    delete_branch: false,
                    headers: [
                        {
                            text: 'Код организации',
                            align: 'start',
                            value: 'idlistedu',
                            width: '135px'
                        },
                        {text: 'Наименование организации', value: 'name_human', width: '400px'},
                        {text: 'Уровень', value: 'level', width: '90px'},
                        {text: 'Регион организации', value: 'region', width: '180px'},
                        {text: 'Код главы по БК', value: 'kbkcode', width: '85px'},
                        {text: 'Тип учреждения', value: 'establishmentkindname', width: '130px'},
                        {text: 'Типизация', value: 'org_type', width: '115px'},
                        {text: 'Направленность', value: 'id_napr', width: '150px'},
                        {text: 'Изменить/удалить', value: '_actions', width: '90px'},
                    ],
                    headers_branches: [
                        {
                            text: 'Код организации',
                            align: 'start',
                            value: 'idlistedu',
                            width: '135px'
                        },
                        {text: 'Наименование организации', value: 'name_human', width: '400px'},
                        {text: 'Уровень', value: 'level', width: '90px'},
                        {text: 'Регион организации', value: 'region', width: '180px'},
                        {text: 'Код главы по БК', value: 'kbkcode', width: '85px'},
                        {text: 'Тип учреждения', value: 'establishmentkindname', width: '132px'},
                        {text: 'Типизация', value: 'org_type', width: '115px'},
                        {text: 'Направленность', value: 'id_napr', width: '150px'},
                        {text: 'Изменить/удалить', value: '_actions', width: '90px'},
                    ],
                }
            },
            methods: {
                OpenInfo(item, slot) {
                    console.log(item)
                    this.ShowBranches1(item)
                    slot.expand(!slot.isExpanded)
                },
                ShowBranches1(item) {
                    let branches = this.show_tables_info_.filter(data => data.id_parent == item.idlistedu && data.idlistedu != item.idlistedu)
                    this.branches_name = branches.map(({name_human}) => name_human)
                    if (this.branches_name == '') {
                        this.branches_name = 'Филиалов нет'
                    }
                },
                compareNumbers(a, b) {
                    return a - b;
                },
                async ExportBranchSelectedReport() {
                    if (this.selected_branches.length > 0) {
                        let data = new FormData()
                        let ides_export = this.selected_branches.map(({idlistedu}) => idlistedu)
                        data.append('ides_export', ides_export)
                        await fetch('ExportReportBranchesSelection', {
                            method: 'post',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            body: data
                        })
                        this.GetDownload()
                    }
                },
                async ExportBranchTableReport() {
                    if (this.show_branches_tables_info.length > 0) {
                        let data = new FormData()
                        let ides_export = this.show_branches_tables_info.map(({idlistedu}) => idlistedu)
                        let id_golov = this.show_branches_tables_info.map(({id_parent}) => id_parent)
                        let golov_org = this.show_tables_info_.filter(data => data.idlistedu == id_golov[0])
                        let golov_org_name = golov_org.map(({name_human}) => name_human)
                        data.append('ides_export', ides_export)
                        data.append('golov_org', golov_org_name)
                        await fetch('ExportReportBranches', {
                            method: 'post',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            body: data
                        })
                        this.GetDownload()
                    }
                },
                async ExportSelectedReport() {
                    if (this.selected.length > 0) {
                        let data = new FormData()
                        let ides_export = this.selected.map(({idlistedu}) => idlistedu)
                        data.append('ides_export', ides_export)
                        await fetch('ExportReportSelection', {
                            method: 'post',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            body: data
                        })
                        this.GetDownload()
                    }
                },
                async ExportTableReport() {
                    if (this.show_tables_info.length > 0) {
                        let data = new FormData()
                        let ides_export = this.show_tables_info.map(({idlistedu}) => idlistedu)
                        data.append('ides_export', ides_export)
                        data.append('level', this.level)
                        data.append('kod_region', this.kod_region)
                        data.append('region', this.region)
                        data.append('code_kbk', this.code_kbk)
                        data.append('kbk', this.kbk)
                        data.append('type_uchr', this.type_uchr)
                        data.append('type', this.type)
                        data.append('napr', this.napr)
                        data.append('type_org', this.type_org)
                        data.append('budgetlvl', this.budgetlvl)
                        await fetch('ExportReport', {
                            method: 'post',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            body: data
                        })
                        this.GetDownload()
                    }
                },
                GetDownload() {
                    let url = new URL(window.location);
                    location = "{{route('GetDownload')}}"
                },
                FillBranchesTable() {
                    this.show_branches_tables_info = this.show_tables_info_.filter(data => data.id_parent == this.kod_gol && data.idlistedu != this.kod_gol)
                },
                ShowItems(item) {
                    this.kod_gol = item.idlistedu
                    this.name_org_to_dialog = item.name_human
                    this.FillBranchesTable()
                    this.dialog_branches = true
                },
                ResetTable() {
                    this.show_tables_info = this.show_tables_info_
                    this.ChangeSelection()
                    this.level = ''
                    this.kod_region = ''
                    this.region = ''
                    this.code_kbk = ''
                    this.kbk = ''
                    this.type_uchr = ''
                    this.type = ''
                    this.napr = ''
                    this.type_org = ''
                    this.budgetlvl = ''
                },
                zip(arrayA, arrayB) {
                    var length = Math.min(arrayA.length, arrayB.length);
                    var result = [];
                    for (var n = 0; n < length; n++) {
                        result.push([arrayA[n], arrayB[n]]);
                    }
                    return result;
                },
                ChangeFieldNameRegion() {
                    if (this.dialog_id_region) {
                        let obj = this.slovar.find(o => o[1] === this.dialog_id_region);
                        this.dialog_region = obj[0]
                    }
                },
                ChangeFieldIdRegion() {
                    if (this.dialog_region) {
                        let obj = this.slovar.find(o => o[0] === this.dialog_region);
                        this.dialog_id_region = obj[1]
                    }
                },
                ChangeFieldIdKBK() {
                    if (this.dialog_kbkname) {
                        let obj = this.slovar1.find(o => o[0] === this.dialog_kbkname);
                        this.dialog_kbkcode = obj[1]
                    }
                },
                ChangeFieldNameKBK() {
                    if (this.dialog_kbkcode) {
                        let obj = this.slovar1.find(o => o[1] === this.dialog_kbkcode);
                        this.dialog_kbkname = obj[0]
                    }
                },
                ShowSelection() {
                    let data = new FormData()
                    fetch('GetTableData', {
                        method: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    })
                        .then((response) => {
                            return response.json()
                        })
                        .then((data) => {
                            let reg = data.map(({region}) => region)
                            let id_reg = data.map(({id_region}) => id_region)
                            let kbk = data.map(({kbkname}) => kbkname)
                            let id_kbk = data.map(({kbkcode}) => kbkcode)
                            this.slovar = this.zip(reg, id_reg)
                            this.slovar1 = this.zip(kbk, id_kbk)
                            this.selection_level = (data.map(({level}) => level)).sort()
                            this.selection_kod_region = (data.map(({id_region}) => id_region)).sort(this.compareNumbers)
                            this.selection_region = (data.map(({region}) => region)).sort()
                            this.selection_code_kbk = (data.map(({kbkcode}) => kbkcode)).sort(this.compareNumbers)
                            this.selection_kbk = (data.map(({kbkname}) => kbkname)).sort()
                            this.selection_type_uchr = (data.map(({establishmentkindname}) => establishmentkindname)).sort()
                            this.selection_type = (data.map(({org_type}) => org_type)).sort()
                            this.selection_napr = (data.map(({id_napr}) => id_napr)).sort()
                            this.selection_type_org = (data.map(({orgtypename}) => orgtypename)).sort()
                            this.selection_budgetlvl = (data.map(({budgetlvlname}) => budgetlvlname)).sort()

                            this.selection_id_parent_changing = data.map(({id_parent}) => id_parent)
                            this.selection_id_parent_changing = this.selection_id_parent_changing.sort(this.compareNumbers)
                            this.selection_kod_region_changing = this.selection_kod_region
                            this.selection_region_changing = this.selection_region
                            this.selection_code_kbk_changing = this.selection_code_kbk
                            this.selection_kbk_changing = this.selection_kbk
                            this.selection_type_uchr_changing = this.selection_type_uchr
                            this.selection_type_changing = this.selection_type
                            this.selection_level_changing = this.selection_level
                            this.selection_napr_changing = this.selection_napr
                            this.selection_type_org_changing = this.selection_type_org
                            this.selection_budgetlvl_changing = this.selection_budgetlvl
                        })
                },
                ChangeSelection() {
                    this.selection_level = (this.show_tables_info.map(({level}) => level)).sort()
                    this.selection_kod_region = (this.show_tables_info.map(({id_region}) => id_region)).sort(this.compareNumbers)
                    this.selection_region = (this.show_tables_info.map(({region}) => region)).sort()
                    this.selection_code_kbk = (this.show_tables_info.map(({kbkcode}) => kbkcode)).sort(this.compareNumbers)
                    this.selection_kbk = (this.show_tables_info.map(({kbkname}) => kbkname)).sort()
                    this.selection_type_uchr = (this.show_tables_info.map(({establishmentkindname}) => establishmentkindname)).sort()
                    this.selection_type = (this.show_tables_info.map(({org_type}) => org_type)).sort()
                    this.selection_napr = (this.show_tables_info.map(({id_napr}) => id_napr)).sort()
                    this.selection_type_org = (this.show_tables_info.map(({orgtypename}) => orgtypename)).sort()
                    this.selection_budgetlvl = (this.show_tables_info.map(({budgetlvlname}) => budgetlvlname)).sort()
                },
                ShowFilteredTable() {
                    this.show_tables_info = this.show_tables_info_
                    if (this.level) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.level == this.level)
                    }
                    if (this.kod_region) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.id_region == this.kod_region)
                    }
                    if (this.region) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.region == this.region)
                    }
                    if (this.code_kbk) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.kbkcode == this.code_kbk)
                    }
                    if (this.kbk) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.kbkname == this.kbk)
                    }
                    if (this.type_uchr) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.establishmentkindname == this.type_uchr)
                    }
                    if (this.type) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.org_type == this.type)
                    }
                    if (this.napr) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.id_napr == this.napr)
                    }
                    if (this.type_org) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.orgtypename == this.type_org)
                    }
                    if (this.budgetlvl) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.budgetlvlname == this.budgetlvl)
                    }
                    this.ChangeSelection()
                },
                async ShowUnitedTable() {//Запрос на данные из таблиц
                    this.show_tables_info_ = []
                    await fetch('ShowUnitedTable', {
                        method: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    })
                        .then((response) => {
                            return response.json()
                        })
                        .then((data) => {
                            this.show_tables_info_ = data
                            this.show_tables_info = this.show_tables_info_
                        })
                },
                ShowDialogDelete(item) {
                    this.kod_org = item.idlistedu
                    this.level_org = item.level
                    this.dialog_delete = true
                },
                ShowDialogChange(item) {
                    this.kod_org = item.idlistedu
                    this.dialog_id_parent = item.id_parent
                    this.dialog_name_human = item.name_human
                    this.dialog_name = item.name
                    this.dialog_name_small = item.name_small
                    this.dialog_id_region = item.id_region
                    this.dialog_region = item.region
                    this.dialog_kbkcode = item.kbkcode
                    this.dialog_kbkname = item.kbkname
                    this.dialog_establishmentkindname = item.establishmentkindname
                    this.dialog_org_type = item.org_type
                    this.dialog_level = item.level
                    this.dialog_id_napr = item.id_napr
                    this.dialog_orgtypename = item.orgtypename
                    this.dialog_budgetlvlname = item.budgetlvlname
                    this.dialog_inn = item.inn
                    this.dialog_kpp = item.kpp
                    this.dialog_address = item.address
                    this.dialog_change = true
                },
                async ChangeData() {
                    if (this.$refs.form.validate()) {
                        let data = new FormData()
                        data.append('kod_org', this.kod_org)
                        data.append('dialog_id_parent', this.dialog_id_parent)
                        data.append('dialog_name_human', this.dialog_name_human)
                        data.append('dialog_name', this.dialog_name)
                        data.append('dialog_name_small', this.dialog_name_small)
                        data.append('dialog_id_region', this.dialog_id_region)
                        data.append('dialog_region', this.dialog_region)
                        data.append('dialog_kbkcode', this.dialog_kbkcode)
                        data.append('dialog_kbkname', this.dialog_kbkname)
                        data.append('dialog_establishmentkindname', this.dialog_establishmentkindname)
                        data.append('dialog_org_type', this.dialog_org_type)
                        data.append('dialog_level', this.dialog_level)
                        data.append('dialog_id_napr', this.dialog_id_napr)
                        data.append('dialog_orgtypename', this.dialog_orgtypename)
                        data.append('dialog_budgetlvlname', this.dialog_budgetlvlname)
                        data.append('dialog_inn', this.dialog_inn)
                        data.append('dialog_kpp', this.dialog_kpp)
                        data.append('dialog_address', this.dialog_address)
                        await fetch('ChangeData', {
                            method: 'post',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            body: data
                        })
                        this.kod_org = '';
                        await this.ShowUnitedTable();
                        await this.ShowFilteredTable();
                        this.dialog_change = false;
                    }
                },
                CheckBranch() {
                    if (this.level_org == 'Головное') {
                        this.delete_branch = true
                    } else {
                        this.DeleteONE();
                    }
                },
                async DeleteONE() {
                    let data = new FormData()
                    data.append('kod_org', this.kod_org)
                    await fetch('DeleteDataONE', {
                        method: 'post',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        body: data
                    })
                    this.kod_org = '';
                    this.delete_branch = false;
                    this.dialog_delete = false;
                    this.ShowUnitedTable();
                },
                async DeleteALL() {
                    let data = new FormData()
                    data.append('kod_org', this.kod_org)
                    await fetch('DeleteDataALL', {
                        method: 'post',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        body: data
                    })
                    this.kod_org = '';
                    this.delete_branch = false;
                    this.dialog_delete = false;
                    this.ShowUnitedTable();
                },
            },
            mounted: function () {
                this.ShowUnitedTable();
                this.ShowSelection();
            },
        })
    </script>

@endsection
