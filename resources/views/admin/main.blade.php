@extends('admin.sample_admin')

@section('title')
    Главная страница
@endsection

@section('content')
    <div id="MainPage">
        <v-app>
            <v-main>
                <div class="container pb-0 mb-0" style="max-width: 1660px">
                    <v-card>
                        <v-container style="max-width: 1600px">
                            <h5 class="text-primary ps-10 mb-3">Фильтрация данных</h5>
                            <v-row>
                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-autocomplete
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="Наименование учредителя"
                                        v-model="name_spr_min"
                                        :items="selection_name_spr_min"
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
                                        label="Наименование субъекта"
                                        v-model="name_region"
                                        :items="selection_name_region"
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
                                        label="Уровень"
                                        v-model="level"
                                        :items="selection_level"
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
                                        label="Статус"
                                        v-model="status_egrul"
                                        :items="selection_status_egrul"
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
                                        label="ОКВЭД основной"
                                        v-model="okvedname"
                                        :items="selection_okvedname"
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
                                        label="ГРБС"
                                        v-model="kbkname"
                                        :items="selection_kbkname"
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
                                        label="Наименование бюджета"
                                        v-model="budgetname"
                                        :items="selection_budgetname"
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
                                        label="ОКФС"
                                        v-model="okfsname"
                                        :items="selection_okfsname"
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
                                        label="Наименование территории НП по ОКТМО"
                                        v-model="oktmoname"
                                        :items="selection_oktmoname"
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
                                        label="Классификация по деятельности"
                                        v-model="org_type"
                                        :items="selection_org_type"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-autocomplete>
                                </v-col>
                            </v-row>
                            {{--                            <h5 class="text-primary ps-10 my-3">Поиск данных</h5>--}}
                            <v-row class="mt-6">
                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="Код МЭИ организации"
                                        v-model="idlistedu"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="Код МЭИ головной организации"
                                        v-model="id_parent"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="ОГРН (РУБПНУБП)"
                                        v-model="ogrn_rub"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="ОГРН (ЕГРЮЛ)"
                                        v-model="ogrn"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="Идентификатор ГИВЦ"
                                        v-model="id_givc"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="Код организации по Сводному реестру"
                                        v-model="id_rubpnubp"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="КПП (РУБПНУБП)"
                                        v-model="kpp_rub"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="КПП (ЕГРЮЛ)"
                                        v-model="kpp"
                                        :items="selection_budgetname"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="ОКПО / Идентификационный номер ТОСП"
                                        v-model="okpo"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="Код ОКОПФ"
                                        v-model="opf_code"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="ИНН (РУБПНУБП)"
                                        v-model="inn_rub"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="ИНН (ЕГРЮЛ)"
                                        v-model="inn"
                                        :items="selection_budgetname"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="Номер реестровой записи"
                                        v-model="recordnum_rub"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
                                </v-col>

                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="3"
                                >
                                    <v-text-field
                                        no-data-text="Нет данных для выбора"
                                        dense
                                        label="Код по КОФК территориального органа ФК"
                                        v-model="kofkcode"
                                        clearable
                                        hide-details
                                        class="ma-0 pa-0"
                                        @change="ShowFilteredTable">
                                    </v-text-field>
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
                    :search="search_main"
                    v-model="selected"
                    :single-select="false"
                    item-key="idlistedu"
                    show-select
                    :headers="headers"
                    :items="show_tables_info"
                    class="elevation-1"
                    :loading="loading"
                    loading-text="Данные загружаются, подождите"
                >
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
                    <template #item.name="{ item }">
                        <a target="_blank" :href="`/org/${item.idlistedu}`">
                            @{{ item.name }}
                        </a>
                    </template>

                    <template v-slot:top>
                        <br>
                        <v-container class="ml-0 pt-0" style="max-width: 1700px">
                            <v-row>
                                <v-col
                                    cols="12"
                                    sm="12"
                                    md="2"
                                    class="mr-0 pr-0"
                                >
                                    <v-btn
                                        @click="selectAllItems"
                                        color="primary"
                                        outlined
                                        class = "ml-2 mt-4"
                                        small
                                    >Выбрать все записи
                                    </v-btn>
                                </v-col>
                                <v-col
                                    cols="12"
                                    sm="12"
                                    md="4"
                                    class="ml-0 pl-0 d-flex align-center justify-end"
                                >
                                    <v-text-field class="ml-0 mt-0"
                                                  v-model="search_main"
                                                  append-icon="mdi-magnify"
                                                  label="Поиск"
                                                  clearable
                                                  single-line
                                                  hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col
                                    cols="12"
                                    sm="12"
                                    md="6"
                                    class="d-flex align-center justify-end"
                                >
                                    <v-btn
                                        class="mr-5 mt-4"
                                        color="primary"
                                        outlined
                                        @click="ExportChoiceSelectedShow"
                                        small
                                    >
                                        Экспортировать выбранные данные
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-container>
                    </template>
                    {{--                    <template--}}
                    {{--                        v-slot:item._actions="{ item }">--}}
                    {{--                        <v-row>--}}
                    {{--                            <v-btn--}}
                    {{--                                icon @click="ShowDialogChange(item)">--}}
                    {{--                                <v-icon>--}}
                    {{--                                    mdi-pencil--}}
                    {{--                                </v-icon>--}}
                    {{--                            </v-btn>--}}
                    {{--                            <v-btn icon @click="ShowDialogDelete(item)">--}}
                    {{--                                <v-icon>--}}
                    {{--                                    mdi-delete--}}
                    {{--                                </v-icon>--}}
                    {{--                            </v-btn>--}}
                    {{--                        </v-row>--}}
                    {{--                    </template>--}}
                </v-data-table>

                {{--                <v-dialog--}}
                {{--                    v-model="dialog_delete"--}}
                {{--                    max-width="500"--}}
                {{--                >--}}
                {{--                    <v-card>--}}
                {{--                        <v-card-title class="text-h5 grey lighten-2">--}}
                {{--                            Подтвердите удаление--}}
                {{--                        </v-card-title>--}}
                {{--                        <br>--}}
                {{--                        <v-card-text>--}}
                {{--                            Вся информация связанная с данной организацией будет удалена. Вы действительно хотите--}}
                {{--                            продолжить?--}}
                {{--                        </v-card-text>--}}

                {{--                        <v-card-actions>--}}
                {{--                            <v-spacer></v-spacer>--}}

                {{--                            <v-btn--}}
                {{--                                color="red darken-1"--}}
                {{--                                text--}}
                {{--                                @click="dialog_delete = false"--}}
                {{--                            >--}}
                {{--                                Отмена--}}
                {{--                            </v-btn>--}}

                {{--                            <v-btn--}}
                {{--                                color="primary"--}}
                {{--                                text--}}
                {{--                                @click="CheckBranch"--}}
                {{--                            >--}}
                {{--                                Удалить--}}
                {{--                            </v-btn>--}}
                {{--                        </v-card-actions>--}}
                {{--                    </v-card>--}}
                {{--                </v-dialog>--}}


                {{--                <v-dialog--}}
                {{--                    v-model="delete_branch"--}}
                {{--                    max-width="500"--}}
                {{--                >--}}
                {{--                    <v-card>--}}
                {{--                        <v-card-title class="text-h5 grey lighten-2">--}}
                {{--                            Удалить филиалы организации?--}}
                {{--                        </v-card-title>--}}
                {{--                        <br>--}}
                {{--                        <v-card-text>--}}
                {{--                            Данная организация - головная. Хотите удалить ее филиалы?--}}
                {{--                        </v-card-text>--}}

                {{--                        <v-card-actions>--}}
                {{--                            <v-spacer></v-spacer>--}}

                {{--                            <v-btn--}}
                {{--                                color="red darken-1"--}}
                {{--                                text--}}
                {{--                                @click="delete_branch = false"--}}
                {{--                            >--}}
                {{--                                Отмена--}}
                {{--                            </v-btn>--}}

                {{--                            <v-btn--}}
                {{--                                color="primary"--}}
                {{--                                text--}}
                {{--                                @click="DeleteONE"--}}
                {{--                            >--}}
                {{--                                Нет--}}
                {{--                            </v-btn>--}}

                {{--                            <v-btn--}}
                {{--                                color="primary"--}}
                {{--                                text--}}
                {{--                                @click="DeleteALL"--}}
                {{--                            >--}}
                {{--                                Да--}}
                {{--                            </v-btn>--}}
                {{--                        </v-card-actions>--}}
                {{--                    </v-card>--}}
                {{--                </v-dialog>--}}

                                <v-dialog
                                    v-model="dialog_change"
                                    fullscreen
                                    hide-overlay
                                >
                                    <v-card>
                                        <v-card-title class="text-h5 grey lighten-2">
                                            Изменение данных
                                        </v-card-title>
                                        <v-card-text class="mt-5 pb-0">
                                            <v-form ref="form">
                                                    <v-row>
{{--                                                        <v-col--}}
{{--                                                            cols="12"--}}
{{--                                                            sm="4"--}}
{{--                                                        >--}}
{{--                                                            <v-autocomplete--}}
{{--                                                                v-model="dialog_id_parent"--}}
{{--                                                                :items="selection_id_parent_changing"--}}
{{--                                                                label="Код головной организации"--}}
{{--                                                                class="ma-0 pa-0"--}}
{{--                                                                clearable--}}
{{--                                                                :rules="[() => !!dialog_id_parent || 'Поле должно быть заполнено!']"--}}
{{--                                                                required--}}
{{--                                                            >--}}
{{--                                                            </v-autocomplete>--}}
{{--                                                        </v-col>--}}
                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_idlistedu"
                                                                label="Код МЭИ организации"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_idlistedu || 'Поле должно быть заполнено!']"
                                                                disabled
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_id_parent"
                                                                label="Код МЭИ головной организации"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_id_parent || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_id_givc"
                                                                label="Идентификатор ГИВЦ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_id_givc || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_id_rubpnubp"
                                                                label="Код организации по Сводному реестру"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_id_rubpnubp || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_id_level"
                                                                label="Код уровеня организации"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_id_level || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_orgtypecode"
                                                                label="Код типа организации"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_orgtypecode || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_establishmentkindcode"
                                                                label="Код типа учреждения"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_establishmentkindcode || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_ogrn"
                                                                label="ОГРН организации ЕГРЮЛ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_ogrn || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_ogrn_rub"
                                                                label="ОГРН организации РУБПНУБП"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_ogrn_rub || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_kod_status_egrul"
                                                                label="Код статуса записи в ЕГРЮЛ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_kod_status_egrul || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_status_egrul"
                                                                label="Статус записи в ЕГРЮЛ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_status_egrul || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_date_remove"
                                                                label="Дата прекращения деятельности ЕГРЮЛ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_date_remove || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_egrul_updated"
                                                                label="Дата обновления ЕГРЮЛ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_egrul_updated || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_recordnum_rub"
                                                                label="Номер реестровой записи"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_recordnum_rub || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_date_start_egrul"
                                                                label="Дата постановки на учет в ФНС"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_date_start_egrul || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_kod_status_rub"
                                                                label="Код статуса организации РУБПНУБП"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_kod_status_rub || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_budgetlvlcode"
                                                                label="Код уровня бюджета"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_budgetlvlcode || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_inclusiondate"
                                                                label="Дата включения организации в Сводный реестр"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_inclusiondate || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_opf_code"
                                                                label="Код ОКОПФ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_opf_code || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_budgetcode"
                                                                label="Код бюджета"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_budgetcode || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_budgetname"
                                                                label="Наименование бюджета"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_budgetname || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_code_spobul"
                                                                label="Код способа образования"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_code_spobul || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_name_spobul"
                                                                label="Наименование способа образования"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_name_spobul || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_is_reorg"
                                                                label="Метка о реорганизации"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_is_reorg || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_org_create_date"
                                                                label="Дата создания организации МОН"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_org_create_date || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_id_spr_min"
                                                                label="Код учредителя"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_id_spr_min || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_name_spr_min"
                                                                label="Наименование учредителя"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_name_spr_min || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_egrul_uchred"
                                                                label="Наименование учредителя ЕГРЮЛ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_egrul_uchred || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_name"
                                                                label="Полное наименование организации ЕГРЮЛ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_name_human || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_name_rub"
                                                                label="Полное наименование организации РУБПНУБП"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_name_rub || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_shortname"
                                                                label="Сокращенное наименование организации"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_shortname || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_name_abb"
                                                                label="Сокращенное наименование организации ЕГРЮЛ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_name_abb || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_name_small"
                                                                label="Наименование для отчетов"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_name_small || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_name_human"
                                                                label="Наименование для АККСУФ"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_name_human || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_okpo"
                                                                label="ОКПО / Идентификационный номер ТОСП"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_okpo || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_inn"
                                                                label="ИНН организации (ЕГРЮЛ)"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_inn || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_inn_rub"
                                                                label="ИНН организации (РУБПНУБП)"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_inn_rub || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_kpp"
                                                                label="КПП организации (ЕГРЮЛ)"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_kpp || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_kpp_rub"
                                                                label="КПП организации (РУБПНУБП)"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_kpp_rub || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_okved"
                                                                label="ОКВЭД основной"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_okved || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_okvedname"
                                                                label="Наименование ОКВЭД основной"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_okvedname || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_kbkcode"
                                                                label="Код ГРБС"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_kbkcode || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_kbkname"
                                                                label="ГРБС"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_kbkname || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_okfs"
                                                                label="Код ОКФС"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_okfs || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_okfsname"
                                                                label="ОКФС"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_okfsname || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_oktmo"
                                                                label="Код территории населенного пункта по ОКТМО"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_oktmo || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_oktmoname"
                                                                label="Наименование территории населенного пункта по ОКТМО"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_oktmoname || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_kofkcode"
                                                                label="Код по КОФК территориального органа Федерального казначейства по месту нахождения организации"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_kofkcode || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_org_type"
                                                                label="Классификация по деятельности"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_org_type || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_id_region"
                                                                label="Код субъекта"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_id_region || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_name_region"
                                                                label="Наименование субъекта"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_name_region || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_tz"
                                                                label="Часовой пояс"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_tz || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_address"
                                                                label="Адрес"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_address || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_phone"
                                                                label="Номер телефона организации"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_phone || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>
                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_site"
                                                                label="Web-сайт"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_site || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_mail"
                                                                label="E-Mail"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_mail || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_heads_fio"
                                                                label="ФИО руководителя организации"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_heads_fio || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_heads_post"
                                                                label="Пост руководителя организации"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_heads_post || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>

                                                        <v-col
                                                            cols="12"
                                                            sm="3"
                                                        >
                                                            <v-text-field
                                                                v-model="dialog_heads_docName"
                                                                label="Документ о назначении"
                                                                class="ma-0 pa-0"
                                                                :rules="[() => !!dialog_heads_docName || 'Поле должно быть заполнено!']"
                                                                required>
                                                            </v-text-field>
                                                        </v-col>


{{--                                                        <v-col--}}
{{--                                                            cols="12"--}}
{{--                                                        >--}}
{{--                                                            <v-textarea--}}
{{--                                                                v-model="dialog_name"--}}
{{--                                                                label="Полное наименование"--}}
{{--                                                                color="teal"--}}
{{--                                                                class="ma-0 pa-0"--}}
{{--                                                                auto-grow--}}
{{--                                                                rows="1"--}}
{{--                                                                :rules="[() => !!dialog_name || 'Поле должно быть заполнено!']"--}}
{{--                                                                required--}}
{{--                                                            >--}}
{{--                                                            </v-textarea>--}}
{{--                                                        </v-col>--}}
                                                    </v-row>
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
                                                :loading="loading_btn_change"
                                                class="mb-2">
                                                Изменить
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-dialog>

                <v-dialog
                    v-model="dialog_export_selected"
                    max-width="455"
                >
                    <v-card>
                        <v-card-title class="grey lighten-2">
                            <h5 class="ps-10">Выберите атрибуты для экспорта</h5>
                        </v-card-title>
                        <v-container>
                            <v-data-table
                                item-key="name"
                                :headers="headers_export"
                                :items="attributes"
                                class="elevation-1"
                                v-model="selected_export"
                                item-key="attributes"
                                :single-select="false"
                                show-select
                            >
                            </v-data-table>
                        </v-container>
                        <v-card-actions class="mr-3 pa-0">
                            <v-spacer></v-spacer>
                            <v-btn
                                color="red darken-1"
                                text
                                @click="ExportClose"
                                class="mb-2">
                                Отмена
                            </v-btn>
                            <v-btn
                                color="primary"
                                :loading="loading_btn"
                                text
                                @click="ExportSelectedReport"
                                class="mb-2">
                                Экспортировать
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
                    dialog_idlistedu: '',
                    dialog_id_parent: '',
                    dialog_id_givc: '',
                    dialog_id_rubpnubp: '',
                    dialog_id_level: '',
                    dialog_orgtypecode: '',
                    dialog_establishmentkindcode: '',
                    dialog_ogrn: '',
                    dialog_ogrn_rub: '',
                    dialog_kod_status_egrul: '',
                    dialog_status_egrul: '',
                    dialog_date_remove: '',
                    dialog_egrul_updated: '',
                    dialog_recordnum_rub: '',
                    dialog_date_start_egrul: '',
                    dialog_kod_status_rub: '',
                    dialog_budgetlvlcode: '',
                    dialog_inclusiondate: '',
                    dialog_opf_code: '',
                    dialog_budgetcode: '',
                    dialog_budgetname: '',
                    dialog_code_spobul: '',
                    dialog_name_spobul: '',
                    dialog_is_reorg: '',
                    dialog_org_create_date: '',

                    dialog_id_spr_min: '',
                    dialog_name_spr_min : '',
                    dialog_egrul_uchred : '',
                    dialog_name : '',
                    dialog_name_rub : '',
                    dialog_shortname : '',
                    dialog_name_abb : '',
                    dialog_name_small : '',
                    dialog_name_human : '',

                    dialog_okpo : '',
                    dialog_inn : '',
                    dialog_inn_rub : '',
                    dialog_kpp : '',
                    dialog_kpp_rub : '',
                    dialog_okved : '',
                    dialog_okvedname : '',
                    dialog_kbkcode : '',
                    dialog_kbkname : '',
                    dialog_okfs : '',
                    dialog_okfsname : '',
                    dialog_oktmo : '',
                    dialog_oktmoname : '',
                    dialog_kofkcode : '',
                    dialog_org_type : '',

                    dialog_id_region : '',
                    dialog_name_region : '',
                    dialog_tz : '',
                    dialog_address : '',
                    dialog_phone : '',
                    dialog_site : '',
                    dialog_mail : '',

                    headsParsed : [],
                    dialog_heads_fio : '',
                    dialog_heads_post : '',
                    dialog_heads_docName : '',


                    ////
                    loading: true,
                    loading_btn: false,
                    loading_btn_change: false,
                    dialog_export_selected: false,
                    ///// ДЛЯ ФИЛЬТРА
                    selection_name_spr_min: [],
                    selection_level: [],
                    selection_name_region: [],
                    selection_status_egrul: [],
                    selection_okvedname: [],
                    selection_kbkname: [],
                    selection_budgetname: [],
                    selection_okfsname: [],
                    selection_oktmoname: [],
                    selection_org_type: [],

                    name_spr_min: '',
                    level: '',
                    name_region: '',
                    status_egrul: '',
                    okvedname: '',
                    kbkname: '',
                    budgetname: '',
                    okfsname: '',
                    oktmoname: '',
                    org_type: '',

                    idlistedu: '',
                    id_parent: '',
                    ogrn_rub: '',
                    ogrn: '',
                    id_givc: '',
                    id_rubpnubp: '',
                    kpp_rub: '',
                    kpp: '',
                    okpo: '',
                    opf_code: '',
                    inn_rub: '',
                    inn: '',
                    recordnum_rub: '',
                    kofkcode: '',
                    /////

                    combined_kod_region: [],
                    combined_kod_kbk: [],
                    search_main: [],
                    search_branch: [],
                    selected_export: [
                        {name: 'Код МЭИ организации'},
                        {name: 'Код МЭИ головной организации'},
                        {name: 'Идентификатор ГИВЦ'},
                        {name: 'Код организации по Сводному реестру'},
                        {name: 'Код уровеня организации'},
                        {name: 'Код типа организации'},
                        {name: 'Код типа учреждения'},
                        {name: 'ОГРН организации ЕГРЮЛ'},
                        {name: 'ОГРН организации РУБПНУБП'},
                        {name: 'Код статуса записи в ЕГРЮЛ'},
                        {name: 'Статус записи в ЕГРЮЛ'},
                        {name: 'Дата прекращения деятельности ЕГРЮЛ'},
                        {name: 'Дата обновления ЕГРЮЛ'},
                        {name: 'Номер реестровой записи'},
                        {name: 'Дата постановки на учет в ФНС'},
                        {name: 'Код статуса организации РУБПНУБП'},
                        {name: 'Код уровня бюджета'},
                        {name: 'Дата включения организации в Сводный реестр'},
                        {name: 'Код ОКОПФ'},
                        {name: 'Код бюджета'},
                        {name: 'Наименование бюджета'},
                        {name: 'Код способа образования'},
                        {name: 'Наименование способа образования'},
                        {name: 'Метка о реорганизации'},
                        {name: 'Дата создания организации МОН'},
                        {name: 'Код учредителя'},
                        {name: 'Наименование учредителя'},
                        {name: 'Наименование учредителя ЕГРЮЛ'},
                        {name: 'Полное наименование организации ЕГРЮЛ'},
                        {name: 'Полное наименование организации РУБПНУБП'},
                        {name: 'Сокращенное наименование организации'},
                        {name: 'Сокращенное наименование организации ЕГРЮЛ'},
                        {name: 'Наименование для отчетов'},
                        {name: 'Наименование для АККСУФ'},
                        {name: 'ОКПО / Идентификационный номер ТОСП'},
                        {name: 'ИНН организации (ЕГРЮЛ)'},
                        {name: 'ИНН организации (РУБПНУБП)'},
                        {name: 'КПП организации (ЕГРЮЛ)'},
                        {name: 'КПП организации (РУБПНУБП)'},
                        {name: 'ОКВЭД основной'},
                        {name: 'Наименование ОКВЭД основной'},
                        {name: 'Код ГРБС'},
                        {name: 'ГРБС'},
                        {name: 'Код ОКФС'},
                        {name: 'ОКФС'},
                        {name: 'Код территории населенного пункта по ОКТМО'},
                        {name: 'Наименование территории населенного пункта по ОКТМО'},
                        {name: 'Код по КОФК территориального органа Федерального казначейства по месту нахождения организации'},
                        {name: 'Классификация по деятельности'},
                        {name: 'Код субъекта'},
                        {name: 'Наименование субъекта'},
                        {name: 'Часовой пояс'},
                        {name: 'Адрес'},
                        {name: 'Номер телефона организации'},
                        {name: 'Web-сайт'},
                        {name: 'E-Mail'},
                        {name: 'Информация о руководителе организации'}
                    ],
                    attributes: [
                        {name: 'Код МЭИ организации'},
                        {name: 'Код МЭИ головной организации'},
                        {name: 'Идентификатор ГИВЦ'},
                        {name: 'Код организации по Сводному реестру'},
                        {name: 'Код уровеня организации'},
                        {name: 'Код типа организации'},
                        {name: 'Код типа учреждения'},
                        {name: 'ОГРН организации ЕГРЮЛ'},
                        {name: 'ОГРН организации РУБПНУБП'},
                        {name: 'Код статуса записи в ЕГРЮЛ'},
                        {name: 'Статус записи в ЕГРЮЛ'},
                        {name: 'Дата прекращения деятельности ЕГРЮЛ'},
                        {name: 'Дата обновления ЕГРЮЛ'},
                        {name: 'Номер реестровой записи'},
                        {name: 'Дата постановки на учет в ФНС'},
                        {name: 'Код статуса организации РУБПНУБП'},
                        {name: 'Код уровня бюджета'},
                        {name: 'Дата включения организации в Сводный реестр'},
                        {name: 'Код ОКОПФ'},
                        {name: 'Код бюджета'},
                        {name: 'Наименование бюджета'},
                        {name: 'Код способа образования'},
                        {name: 'Наименование способа образования'},
                        {name: 'Метка о реорганизации'},
                        {name: 'Дата создания организации МОН'},
                        {name: 'Код учредителя'},
                        {name: 'Наименование учредителя'},
                        {name: 'Наименование учредителя ЕГРЮЛ'},
                        {name: 'Полное наименование организации ЕГРЮЛ'},
                        {name: 'Полное наименование организации РУБПНУБП'},
                        {name: 'Сокращенное наименование организации'},
                        {name: 'Сокращенное наименование организации ЕГРЮЛ'},
                        {name: 'Наименование для отчетов'},
                        {name: 'Наименование для АККСУФ'},
                        {name: 'ОКПО / Идентификационный номер ТОСП'},
                        {name: 'ИНН организации (ЕГРЮЛ)'},
                        {name: 'ИНН организации (РУБПНУБП)'},
                        {name: 'КПП организации (ЕГРЮЛ)'},
                        {name: 'КПП организации (РУБПНУБП)'},
                        {name: 'ОКВЭД основной'},
                        {name: 'Наименование ОКВЭД основной'},
                        {name: 'Код ГРБС'},
                        {name: 'ГРБС'},
                        {name: 'Код ОКФС'},
                        {name: 'ОКФС'},
                        {name: 'Код территории населенного пункта по ОКТМО'},
                        {name: 'Наименование территории населенного пункта по ОКТМО'},
                        {name: 'Код по КОФК территориального органа Федерального казначейства по месту нахождения организации'},
                        {name: 'Классификация по деятельности'},
                        {name: 'Код субъекта'},
                        {name: 'Наименование субъекта'},
                        {name: 'Часовой пояс'},
                        {name: 'Адрес'},
                        {name: 'Номер телефона организации'},
                        {name: 'Web-сайт'},
                        {name: 'E-Mail'},
                        {name: 'Информация о руководителе организации'}
                    ],
                    dialog_export: false,
                    show_dialog: false,
                    //branches_name: [],
                    id: '',

                    slovar: [],
                    slovar1: [],
                    inn_kpp_rules: [
                        v => (!v || Number(v)) || 'Поле должно содержать только числа!',
                        v => !!v || 'Поле должно быть заполнено!',
                    ],



                    name_org_to_dialog: '',
                    kod_gol: '',
                    dialog_branches: false,


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
                            text: 'Код МЭИ',
                            align: 'center',
                            value: 'idlistedu',
                            width: '110px'
                        },
                        {text: 'Полное наименование',align: 'center', value: 'name'},
                        {text: 'Уровень',align: 'center', value: 'level', width: '110px'},
                        {text: 'Регион',align: 'center', value: 'name_region', width: '150px'},
                        {text: 'Статус',align: 'center', value: 'status_egrul', width: '250px'},
                        {text: 'ИНН (РУБПНУБП)',align: 'center', value: 'inn_rub', width: '120px'},
                        // {text: 'РУБПНУБП',align: 'center', value: 'id_rubpnubp', width: '120px'},
                        {text: 'Филиалы',align: 'center', value: 'hasBranches', width: '120px'},
                        {text: 'Изменить/удалить', value: '_actions', width: '90px'},
                    ],

                    headers_export: [
                        {text: 'Атрибуты',align: 'center',sortable: false,value: 'name'},
                    ],
                }
            },
            methods: {
                selectAllItems() {
                    if (this.selected.length === this.show_tables_info.length) {
                        this.selected = []
                    } else {
                        this.selected = this.show_tables_info
                    }
                },
                ExportClose() {
                    this.dialog_export_selected = false
                    this.selected_export = this.attributes
                },

                ExportChoiceSelectedShow() {
                    if (this.selected.length > 0) {
                        this.dialog_export_selected = true
                    }
                },
                async ExportSelectedReport() {
                    if (this.selected_export.length > 0) {
                        this.loading_btn = true
                        let data = new FormData()
                        let ides = this.selected.map(({idlistedu}) => idlistedu)
                        let attributes = this.selected_export.map(({name}) => name)
                        data.append('ides', ides)
                        data.append('attributes', attributes)
                        await fetch('ExportReportSelection', {
                            method: 'post',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            body: data
                        })
                        this.GetDownload()
                    }
                },
                GetDownload() {
                    let url = "{{ route('GetDownload') }}";
                    window.location = url;
                    this.loading_btn = false
                },
                // FillBranchesTable() {
                //     this.show_branches_tables_info = this.show_tables_info_.filter(data => data.id_parent == this.kod_gol && data.idlistedu != this.kod_gol)
                // },
                // ShowItems(item) {
                //     this.kod_gol = item.idlistedu
                //     this.name_org_to_dialog = item.name_human
                //     this.FillBranchesTable()
                //     this.dialog_branches = true
                // },
                ResetTable() {
                    this.show_tables_info = this.show_tables_info_
                    this.ChangeSelection()
                    this.name_spr_min = ''
                    this.level = ''
                    this.name_region = ''
                    this.status_egrul = ''
                    this.okvedname = ''
                    this.kbkname = ''
                    this.budgetname = ''
                    this.okfsname = ''
                    this.oktmoname = ''
                    this.org_type = ''
                    this.idlistedu = ''
                    this.id_parent = ''
                    this.ogrn_rub = ''
                    this.ogrn = ''
                    this.id_givc = ''
                    this.id_rubpnubp = ''
                    this.kpp_rub = ''
                    this.kpp = ''
                    this.okpo = ''
                    this.opf_code = ''
                    this.inn_rub = ''
                    this.inn = ''
                    this.recordnum_rub = ''
                    this.kofkcode = ''
                },
                // zip(arrayA, arrayB) {
                //     var length = Math.min(arrayA.length, arrayB.length);
                //     var result = [];
                //     for (var n = 0; n < length; n++) {
                //         result.push([arrayA[n], arrayB[n]]);
                //     }
                //     return result;
                // },
                // ChangeFieldNameRegion() {
                //     if (this.dialog_id_region) {
                //         let obj = this.slovar.find(o => o[1] === this.dialog_id_region);
                //         this.dialog_region = obj[0]
                //     }
                // },
                // ChangeFieldIdRegion() {
                //     if (this.dialog_region) {
                //         let obj = this.slovar.find(o => o[0] === this.dialog_region);
                //         this.dialog_id_region = obj[1]
                //     }
                // },
                // ChangeFieldIdKBK() {
                //     if (this.dialog_kbkname) {
                //         let obj = this.slovar1.find(o => o[0] === this.dialog_kbkname);
                //         this.dialog_kbkcode = obj[1]
                //     }
                // },
                // ChangeFieldNameKBK() {
                //     if (this.dialog_kbkcode) {
                //         let obj = this.slovar1.find(o => o[1] === this.dialog_kbkcode);
                //         this.dialog_kbkname = obj[0]
                //     }
                // },
                // CombineNameKod(kod, name) {
                //     let combinedArray = Object.keys(kod).map(key => {
                //         return `${name[key]} (${kod[key]})`;
                //     });
                //     return combinedArray;
                // },
                ShowSelection() {
                    //let data = new FormData()
                    fetch('GetTableData', {
                        method: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    })
                        .then((response) => {
                            return response.json()
                        })
                        .then((data) => {
                            this.selection_name_spr_min = (data.map(({name_spr_min}) => name_spr_min).filter(Boolean)).sort()
                            this.selection_level = (this.show_tables_info_.map(({level}) => level).filter(Boolean)).sort()
                            this.selection_name_region = (data.map(({name_region}) => name_region).filter(Boolean)).sort()
                            this.selection_status_egrul = (data.map(({status_egrul}) => status_egrul).filter(Boolean)).sort();
                            this.selection_okvedname = (data.map(({okvedname}) => okvedname).filter(Boolean)).sort()
                            this.selection_kbkname = (data.map(({kbkname}) => kbkname).filter(Boolean)).sort()
                            this.selection_budgetname = (data.map(({budgetname}) => budgetname).filter(Boolean)).sort()
                            this.selection_okfsname = (data.map(({okfsname}) => okfsname).filter(Boolean)).sort()
                            this.selection_oktmoname = (data.map(({oktmoname}) => oktmoname).filter(Boolean)).sort()
                            this.selection_org_type = (data.map(({org_type}) => org_type).filter(Boolean)).sort()
                        })
                },
                ChangeSelection() {
                    this.selection_name_spr_min = (this.show_tables_info.map(({name_spr_min}) => name_spr_min).filter(Boolean)).sort()
                    this.selection_level = (this.show_tables_info.map(({level}) => level).filter(Boolean)).sort()
                    this.selection_name_region = (this.show_tables_info.map(({name_region}) => name_region).filter(Boolean)).sort()
                    this.selection_status_egrul = (this.show_tables_info.map(({status_egrul}) => status_egrul).filter(Boolean)).sort()
                    this.selection_okvedname = (this.show_tables_info.map(({okvedname}) => okvedname).filter(Boolean)).sort()
                    this.selection_kbkname = (this.show_tables_info.map(({kbkname}) => kbkname).filter(Boolean)).sort()
                    this.selection_budgetname = (this.show_tables_info.map(({budgetname}) => budgetname).filter(Boolean)).sort()
                    this.selection_okfsname = (this.show_tables_info.map(({okfsname}) => okfsname).filter(Boolean)).sort()
                    this.selection_oktmoname = (this.show_tables_info.map(({oktmoname}) => oktmoname).filter(Boolean)).sort()
                    this.selection_org_type = (this.show_tables_info.map(({org_type}) => org_type).filter(Boolean)).sort()
                },
                ShowFilteredTable() {
                    this.show_tables_info = this.show_tables_info_
                    if (this.name_spr_min) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.name_spr_min === this.name_spr_min)
                    }
                    if (this.level) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.level === this.level)
                    }
                    if (this.name_region) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.name_region === this.name_region)
                    }
                    if (this.status_egrul) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.status_egrul === this.status_egrul)
                    }
                    if (this.okvedname) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.okvedname === this.okvedname)
                    }
                    if (this.kbkname) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.kbkname === this.kbkname)
                    }
                    if (this.budgetname) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.budgetname === this.budgetname)
                    }
                    if (this.okfsname) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.okfsname === this.okfsname)
                    }
                    if (this.oktmoname) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.oktmoname === this.oktmoname)
                    }
                    if (this.org_type) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.org_type === this.org_type)
                    }
                    if (this.idlistedu) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.idlistedu === this.idlistedu)
                    }
                    if (this.id_parent) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.id_parent === this.id_parent)
                    }
                    if (this.ogrn_rub) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.ogrn_rub === this.ogrn_rub)
                    }
                    if (this.id_givc) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.id_givc === this.id_givc)
                    }
                    if (this.id_rubpnubp) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.id_rubpnubp === this.id_rubpnubp)
                    }
                    if (this.kpp_rub) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.kpp_rub === this.kpp_rub)
                    }
                    if (this.kpp) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.kpp === this.kpp)
                    }
                    if (this.okpo) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.okpo === this.okpo)
                    }
                    if (this.opf_code) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.opf_code === this.opf_code)
                    }
                    if (this.inn_rub) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.inn_rub === this.inn_rub)
                    }
                    if (this.inn) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.inn === this.inn)
                    }
                    if (this.recordnum_rub) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.recordnum_rub === this.recordnum_rub)
                    }
                    if (this.kofkcode) {
                        this.show_tables_info = this.show_tables_info.filter(data => data.kofkcode === this.kofkcode)
                    }
                    this.ChangeSelection()
                },
                hasBranches(id) {
                    for (let i = 0; i < this.show_tables_info_.length; i++) {
                        if (this.show_tables_info_[i]['id_parent'] == id && this.show_tables_info_[i]['idlistedu'] != id) {
                            return true
                        }
                    }
                    return false
                },
                async ShowUnitedTable() {//Запрос на данные из таблиц
                    this.show_tables_info_ = []
                    this.loading = true
                    await fetch('ShowUnitedTable', {
                        method: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    })
                        .then((response) => {
                            return response.json()
                        })
                        .then((data) => {
                            this.show_tables_info_ = data
                            for (let i = 0; i < this.show_tables_info_.length; i++) {
                                if (this.show_tables_info_[i]['id_level'] === 1) {
                                    this.show_tables_info_[i]['level'] = 'Головное';
                                    if (this.hasBranches(this.show_tables_info_[i]['idlistedu'])) {
                                        this.show_tables_info_[i]['hasBranches'] = 'есть';
                                    } else {
                                        this.show_tables_info_[i]['hasBranches'] = 'нет';
                                    }
                                } else {
                                    this.show_tables_info_[i]['level'] = 'Филиал';
                                }
                            }
                            this.show_tables_info = this.show_tables_info_
                            console.log(this.show_tables_info)
                            this.loading = false
                        })
                },
                // ShowDialogDelete(item) {
                //     this.kod_org = item.idlistedu
                //     this.level_org = item.level
                //     this.dialog_delete = true
                // },
                ShowDialogChange(item) {
                    this.dialog_idlistedu = item.idlistedu
                    this.dialog_id_parent = item.id_parent
                    this.dialog_id_givc = item.id_givc
                    this.dialog_id_rubpnubp = item.id_rubpnubp
                    this.dialog_id_level = item.id_level
                    this.dialog_orgtypecode = item.orgtypecode
                    this.dialog_establishmentkindcode = item.establishmentkindcode
                    this.dialog_ogrn = item.ogrn
                    this.dialog_ogrn_rub = item.ogrn_rub
                    this.dialog_kod_status_egrul = item.kod_status_egrul
                    this.dialog_status_egrul = item.status_egrul
                    this.dialog_date_remove = item.date_remove
                    this.dialog_egrul_updated = item.egrul_updated
                    this.dialog_recordnum_rub = item.recordnum_rub
                    this.dialog_date_start_egrul = item.date_start_egrul
                    this.dialog_kod_status_rub = item.kod_status_rub
                    this.dialog_budgetlvlcode = item.budgetlvlcode
                    this.dialog_inclusiondate = item.inclusiondate
                    this.dialog_opf_code = item.opf_code
                    this.dialog_budgetcode = item.budgetcode
                    this.dialog_budgetname = item.budgetname
                    this.dialog_code_spobul = item.code_spobul
                    this.dialog_name_spobul = item.name_spobul
                    this.dialog_is_reorg = item.is_reorg
                    this.dialog_org_create_date = item.org_create_date

                    this.dialog_id_spr_min = item.id_spr_min
                    this.dialog_name_spr_min = item.name_spr_min
                    this.dialog_egrul_uchred = item.egrul_uchred
                    this.dialog_name = item.name
                    this.dialog_name_rub = item.name_rub
                    this.dialog_shortname = item.shortname
                    this.dialog_name_abb = item.name_abb
                    this.dialog_name_small = item.name_small
                    this.dialog_name_human = item.name_human
                    this.dialog_okpo = item.okpo
                    this.dialog_inn = item.inn
                    this.dialog_inn_rub = item.inn_rub
                    this.dialog_kpp = item.kpp
                    this.dialog_kpp_rub = item.kpp_rub
                    this.dialog_okved = item.okved
                    this.dialog_okvedname = item.okvedname
                    this.dialog_kbkcode = item.kbkcode
                    this.dialog_kbkname = item.kbkname
                    this.dialog_okfs = item.okfs
                    this.dialog_okfsname = item.okfsname
                    this.dialog_oktmo = item.oktmo
                    this.dialog_oktmoname = item.oktmoname
                    this.dialog_kofkcode = item.kofkcode
                    this.dialog_org_type = item.org_type

                    this.dialog_id_region = item.id_region
                    this.dialog_name_region = item.name_region
                    this.dialog_tz = item.tz
                    this.dialog_address = item.address
                    this.dialog_phone = item.phone
                    this.dialog_site = item.site
                    this.dialog_mail = item.mail

                    this.headsParsed = JSON.parse(item.heads)
                    this.dialog_heads_fio = this.headsParsed[0]['fio']
                    this.dialog_heads_post = this.headsParsed[0]['post']
                    this.dialog_heads_docName = this.headsParsed[0]['docName']
                    this.dialog_change = true
                },
                async ChangeData() {
                    // if (this.$refs.form.validate()) {
                        this.loading_btn_change = true
                        let data = new FormData()
                        data.append('dialog_idlistedu', this.dialog_idlistedu)
                        data.append('dialog_id_parent', this.dialog_id_parent)
                        data.append('dialog_id_givc', this.dialog_id_givc)
                        data.append('dialog_id_rubpnubp', this.dialog_id_rubpnubp)
                        data.append('dialog_id_level', this.dialog_id_level)
                        data.append('dialog_orgtypecode', this.dialog_orgtypecode)
                        data.append('dialog_establishmentkindcode', this.dialog_establishmentkindcode)
                        data.append('dialog_ogrn', this.dialog_ogrn)
                        data.append('dialog_ogrn_rub', this.dialog_ogrn_rub)
                        data.append('dialog_kod_status_egrul', this.dialog_kod_status_egrul)
                        data.append('dialog_status_egrul', this.dialog_status_egrul)
                        data.append('dialog_date_remove', this.dialog_date_remove)
                        data.append('dialog_egrul_updated', this.dialog_egrul_updated)
                        data.append('dialog_recordnum_rub', this.dialog_recordnum_rub)
                        data.append('dialog_date_start_egrul', this.dialog_date_start_egrul)
                        data.append('dialog_kod_status_rub', this.dialog_kod_status_rub)
                        data.append('dialog_budgetlvlcode', this.dialog_budgetlvlcode)
                        data.append('dialog_inclusiondate', this.dialog_inclusiondate)
                        data.append('dialog_opf_code', this.dialog_opf_code)
                        data.append('dialog_budgetcode', this.dialog_budgetcode)
                        data.append('dialog_budgetname', this.dialog_budgetname)
                        data.append('dialog_code_spobul', this.dialog_code_spobul)
                        data.append('dialog_name_spobul', this.dialog_name_spobul)
                        data.append('dialog_is_reorg', this.dialog_is_reorg)
                        data.append('dialog_org_create_date', this.dialog_org_create_date)
                        data.append('dialog_orgs_id_spr_min', this.dialog_orgs_id_spr_min)
                        data.append('dialog_name_spr_min', this.dialog_name_spr_min)
                        data.append('dialog_egrul_uchred', this.dialog_egrul_uchred)
                        data.append('dialog_name', this.dialog_name)
                        data.append('dialog_name_rub', this.dialog_name_rub)
                        data.append('dialog_shortname', this.dialog_shortname)
                        data.append('dialog_name_abb', this.dialog_name_abb)
                        data.append('dialog_name_small', this.dialog_name_small)
                        data.append('dialog_name_human', this.dialog_name_human)
                        data.append('dialog_okpo', this.dialog_okpo)
                        data.append('dialog_inn', this.dialog_inn)
                        data.append('dialog_inn_rub', this.dialog_inn_rub)
                        data.append('dialog_kpp', this.dialog_kpp)
                        data.append('dialog_kpp_rub', this.dialog_kpp_rub)
                        data.append('dialog_okved', this.dialog_okved)
                        data.append('dialog_okvedname', this.dialog_okvedname)
                        data.append('dialog_kbkcode', this.dialog_kbkcode)
                        data.append('dialog_kbkname', this.dialog_kbkname)
                        data.append('dialog_okfs', this.dialog_okfs)
                        data.append('dialog_okfsname', this.dialog_okfsname)
                        data.append('dialog_oktmo', this.dialog_oktmo)
                        data.append('dialog_oktmoname', this.dialog_oktmoname)
                        data.append('dialog_kofkcode', this.dialog_kofkcode)
                        data.append('dialog_org_type', this.dialog_org_type)
                        data.append('dialog_id_region', this.dialog_id_region)
                        data.append('dialog_name_region', this.dialog_name_region)
                        data.append('dialog_tz', this.dialog_tz)
                        data.append('dialog_address', this.dialog_address)
                        data.append('dialog_phone', this.dialog_phone)
                        data.append('dialog_site', this.dialog_site)
                        data.append('dialog_mail', this.dialog_mail)

                        this.headsParsed[0]['fio'] = this.dialog_heads_fio
                        this.headsParsed[0]['post'] = this.dialog_heads_post
                        this.headsParsed[0]['docName'] = this.dialog_heads_docName
                        // console.log(JSON.stringify(this.headsParsed))
                        data.append('heads', JSON.stringify(this.headsParsed))
                        await fetch('ChangeData', {
                            method: 'post',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            body: data
                        })
                        // this.kod_org = '';
                        await this.ShowUnitedTable();
                        await this.ShowFilteredTable();
                        this.loading_btn_change = false
                        this.dialog_change = false;
                    // }
                },
                // CheckBranch() {
                //     if (this.level_org == 'Головное') {
                //         this.delete_branch = true
                //     } else {
                //         this.DeleteONE();
                //     }
                // },
                // async DeleteONE() {
                //     let data = new FormData()
                //     data.append('kod_org', this.kod_org)
                //     await fetch('DeleteDataONE', {
                //         method: 'post',
                //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                //         body: data
                //     })
                //     this.kod_org = '';
                //     this.delete_branch = false;
                //     this.dialog_delete = false;
                //     this.ShowUnitedTable();
                // },
                // async DeleteALL() {
                //     let data = new FormData()
                //     data.append('kod_org', this.kod_org)
                //     await fetch('DeleteDataALL', {
                //         method: 'post',
                //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                //         body: data
                //     })
                //     this.kod_org = '';
                //     this.delete_branch = false;
                //     this.dialog_delete = false;
                //     this.ShowUnitedTable();
                // },
            },
            mounted: function () {
                this.ShowUnitedTable();
                this.ShowSelection();
            },
        })
    </script>

@endsection
