@extends('sample')

@section('title')
    Главная страница
@endsection

@section('content')

    <div id="MainPage">
        <v-app>
            <v-main>
                <div class="container pb-0 mb-0" style="max-width: 1660px">
                    <div class="d-flex align-center ps-10 mb-3">
                        <h5 class="text-primary">Фильтрация данных</h5>
                        <v-icon
                            class="ml-2 cursor-pointer"
                            @click="toggleFilters"
                        >
                            {{ @filtersVisible ? 'mdi-chevron-up' : 'mdi-chevron-down' }}
                        </v-icon>
                    </div>
                    <v-card v-show="filtersVisible">
                        <v-container style="max-width: 1600px">
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
                    :headers="computedHeaders"
                    :items="show_tables_info"
                    class="elevation-1"
                    :loading="loading"
                    loading-text="Данные загружаются, подождите"
                >
                    <template #item.name="{ item }">
                        <a target="_blank" :href="`/org/${item.idlistedu}`">
                            @{{ item.name }}
                        </a>
                    </template>
                    <template v-slot:top>
                        <br>
                        <v-container class="ml-0 pt-0" style="max-width: 1700px">
                            <v-row class="d-flex flex-wrap">
                                <!-- Поле поиска -->
                                <v-col
                                    cols="12"
                                    sm="12"
                                    md="4"
                                    class="ml-0 pl-0 pt-0 d-flex align-center justify-end"
                                >
                                    <v-text-field
                                        class="ml-2 pl-2 mt-0"
                                        v-model="search_main"
                                        append-icon="mdi-magnify"
                                        label="Поиск"
                                        clearable
                                        single-line
                                        hide-details
                                    ></v-text-field>
                                </v-col>

                                <!-- Кнопки: объединяем в один столбец на мобильных устройствах -->
                                <v-col
                                    cols="12"
                                    sm="12"
                                    md="6"
                                    class="d-flex align-center justify-start"
                                >
                                    <v-btn
                                        @click="selectAllItems"
                                        color="primary"
                                        outlined
                                        class="mr-2 mt-0"
                                        small
                                    >
                                        Выбрать все записи
                                    </v-btn>
                                    <v-btn
                                        class="mt-0"
                                        color="primary"
                                        outlined
                                        @click="ExportChoiceSelectedShow"
                                        small
                                    >
                                        Экспортировать
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

{{--                <v-dialog--}}
{{--                    v-model="dialog_change"--}}
{{--                    width="800"--}}
{{--                >--}}
{{--                    <v-card>--}}
{{--                        <v-card-title class="text-h5 grey lighten-2">--}}
{{--                            Изменение данных--}}
{{--                        </v-card-title>--}}
{{--                        <v-card-text class="mt-3 pb-0">--}}
{{--                            <v-form ref="form">--}}
{{--                                <v-container>--}}
{{--                                    <v-row>--}}
{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="4"--}}
{{--                                        >--}}
{{--                                            <v-autocomplete--}}
{{--                                                v-model="dialog_id_parent"--}}
{{--                                                :items="selection_id_parent_changing"--}}
{{--                                                label="Код головной организации"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                clearable--}}
{{--                                                :rules="[() => !!dialog_id_parent || 'Поле должно быть заполнено!']"--}}
{{--                                                required--}}
{{--                                            >--}}
{{--                                            </v-autocomplete>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="8"--}}
{{--                                        >--}}
{{--                                            <v-text-field--}}
{{--                                                v-model="dialog_name_human"--}}
{{--                                                label="Наименование организации"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_name_human || 'Поле должно быть заполнено!']"--}}
{{--                                                required>--}}
{{--                                            </v-text-field>--}}
{{--                                        </v-col>--}}
{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                        >--}}
{{--                                            <v-textarea--}}
{{--                                                v-model="dialog_name"--}}
{{--                                                label="Полное наименование"--}}
{{--                                                color="teal"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                auto-grow--}}
{{--                                                rows="1"--}}
{{--                                                :rules="[() => !!dialog_name || 'Поле должно быть заполнено!']"--}}
{{--                                                required--}}
{{--                                            >--}}
{{--                                            </v-textarea>--}}
{{--                                        </v-col>--}}
{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                        >--}}
{{--                                            <v-text-field--}}
{{--                                                v-model="dialog_name_small"--}}
{{--                                                label="Сокращенное наименование"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_name_small || 'Поле должно быть заполнено!']"--}}
{{--                                                required>--}}
{{--                                            </v-text-field>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="4"--}}
{{--                                        >--}}
{{--                                            <v-autocomplete--}}
{{--                                                v-model="dialog_id_region"--}}
{{--                                                :items="selection_kod_region_changing"--}}
{{--                                                label="ID субъекта РФ организации"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_id_region || 'Поле должно быть заполнено!']"--}}
{{--                                                required--}}
{{--                                                clearable--}}
{{--                                                @change="ChangeFieldNameRegion">--}}
{{--                                            </v-autocomplete>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="8"--}}
{{--                                        >--}}
{{--                                            <v-autocomplete--}}
{{--                                                v-model="dialog_region"--}}
{{--                                                :items="selection_region_changing"--}}
{{--                                                label="Регион организации"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_region || 'Поле должно быть заполнено!']"--}}
{{--                                                required--}}
{{--                                                clearable--}}
{{--                                                @change="ChangeFieldIdRegion">--}}
{{--                                            </v-autocomplete>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="4"--}}
{{--                                        >--}}
{{--                                            <v-autocomplete--}}
{{--                                                v-model="dialog_kbkcode"--}}
{{--                                                :items="selection_code_kbk_changing"--}}
{{--                                                label="Код главы по БК"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_kbkcode || 'Поле должно быть заполнено!']"--}}
{{--                                                required--}}
{{--                                                clearable--}}
{{--                                                @change="ChangeFieldNameKBK">--}}
{{--                                            </v-autocomplete>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="8"--}}
{{--                                        >--}}
{{--                                            <v-autocomplete--}}
{{--                                                v-model="dialog_kbkname"--}}
{{--                                                :items="selection_kbk_changing"--}}
{{--                                                label="Наименование главы по БК"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_kbkname || 'Поле должно быть заполнено!']"--}}
{{--                                                required--}}
{{--                                                clearable--}}
{{--                                                @change="ChangeFieldIdKBK">--}}
{{--                                            </v-autocomplete>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="6"--}}
{{--                                            md="4"--}}
{{--                                        >--}}
{{--                                            <v-select--}}
{{--                                                v-model="dialog_establishmentkindname"--}}
{{--                                                :items="selection_type_uchr_changing"--}}
{{--                                                label="Тип учреждения"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_establishmentkindname || 'Поле должно быть заполнено!']"--}}
{{--                                                required>--}}
{{--                                            </v-select>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="6"--}}
{{--                                            md="4"--}}
{{--                                        >--}}
{{--                                            <v-select--}}
{{--                                                v-model="dialog_org_type"--}}
{{--                                                :items="selection_type_changing"--}}
{{--                                                label="Типизация"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_org_type || 'Поле должно быть заполнено!']"--}}
{{--                                                required>--}}
{{--                                            </v-select>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="6"--}}
{{--                                            md="4"--}}
{{--                                        >--}}
{{--                                            <v-select--}}
{{--                                                v-model="dialog_level"--}}
{{--                                                :items="selection_level_changing"--}}
{{--                                                label="Уровень"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_level || 'Поле должно быть заполнено!']"--}}
{{--                                                required>--}}
{{--                                            </v-select>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="6"--}}
{{--                                            md="4"--}}
{{--                                        >--}}
{{--                                            <v-select--}}
{{--                                                v-model="dialog_id_napr"--}}
{{--                                                :items="selection_napr_changing"--}}
{{--                                                label="Направленность"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_id_napr || 'Поле должно быть заполнено!']"--}}
{{--                                                required>--}}
{{--                                            </v-select>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="6"--}}
{{--                                            md="4"--}}
{{--                                        >--}}
{{--                                            <v-select--}}
{{--                                                v-model="dialog_orgtypename"--}}
{{--                                                :items="selection_type_org_changing"--}}
{{--                                                label="Тип организации"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_orgtypename || 'Поле должно быть заполнено!']"--}}
{{--                                                required>--}}
{{--                                            </v-select>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="6"--}}
{{--                                            md="4"--}}
{{--                                        >--}}
{{--                                            <v-select--}}
{{--                                                v-model="dialog_budgetlvlname"--}}
{{--                                                :items="selection_budgetlvl_changing"--}}
{{--                                                label="Уровень бюджета"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_budgetlvlname || 'Поле должно быть заполнено!']"--}}
{{--                                                required>--}}
{{--                                            </v-select>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="6"--}}
{{--                                        >--}}
{{--                                            <v-text-field--}}
{{--                                                v-model="dialog_inn"--}}
{{--                                                label="ИНН"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="inn_kpp_rules"--}}
{{--                                                required>--}}
{{--                                            </v-text-field>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                            sm="6"--}}
{{--                                        >--}}
{{--                                            <v-text-field--}}
{{--                                                v-model="dialog_kpp"--}}
{{--                                                label="КПП"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="inn_kpp_rules"--}}
{{--                                                required>--}}
{{--                                            </v-text-field>--}}
{{--                                        </v-col>--}}

{{--                                        <v-col--}}
{{--                                            cols="12"--}}
{{--                                        >--}}
{{--                                            <v-text-field--}}
{{--                                                v-model="dialog_address"--}}
{{--                                                label="Адрес"--}}
{{--                                                class="ma-0 pa-0"--}}
{{--                                                :rules="[() => !!dialog_address || 'Поле должно быть заполнено!']"--}}
{{--                                                required>--}}
{{--                                            </v-text-field>--}}
{{--                                        </v-col>--}}
{{--                                    </v-row>--}}
{{--                                </v-container>--}}
{{--                            </v-form>--}}
{{--                        </v-card-text>--}}
{{--                        <v-card-actions class="mr-3 pa-0">--}}
{{--                            <v-spacer></v-spacer>--}}
{{--                            <v-btn--}}
{{--                                color="red darken-1"--}}
{{--                                text--}}
{{--                                @click="dialog_change = false"--}}
{{--                                class="mb-2">--}}
{{--                                Отмена--}}
{{--                            </v-btn>--}}
{{--                            <v-btn--}}
{{--                                color="primary"--}}
{{--                                text--}}
{{--                                @click="ChangeData"--}}
{{--                                class="mb-2">--}}
{{--                                Изменить--}}
{{--                            </v-btn>--}}
{{--                        </v-card-actions>--}}
{{--                    </v-card>--}}
{{--                </v-dialog>--}}

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
                    filtersVisible: false,
                    loading: true,
                    loading_btn: false,
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
                        {text: 'Уровень',align: 'center', value: 'level', width: '110px', class: 'd-none d-md-table-cell'},
                        {text: 'Регион',align: 'center', value: 'name_region', width: '150px', class: 'd-none d-md-table-cell'},
                        {text: 'Статус',align: 'center', value: 'status_egrul', width: '250px', class: 'd-none d-md-table-cell'},
                        {text: 'ИНН (РУБПНУБП)',align: 'center', value: 'inn_rub', width: '120px', class: 'd-none d-md-table-cell'},
                        {text: 'РУБПНУБП',align: 'center', value: 'id_rubpnubp', width: '120px', class: 'd-none d-md-table-cell'},
                        {text: 'Филиалы',align: 'center', value: 'hasBranches', width: '120px', class: 'd-none d-md-table-cell'},
                    ],
                    screenWidth: window.innerWidth,

                    headers_export: [
                        {text: 'Атрибуты',align: 'center',sortable: false,value: 'name'},
                    ],
                }
            },
            computed: {
                computedHeaders() {
                    // Показываем все столбцы на больших экранах
                    if (this.screenWidth >= 768) return this.headers;

                    // На телефонах показываем только нужные столбцы
                    return this.headers.filter(header => ['idlistedu', 'name'].includes(header.value));
                }
            },
            mounted() {
                // Слушаем изменение размера окна
                window.addEventListener('resize', this.updateScreenWidth);
            },
            beforeDestroy() {
                window.removeEventListener('resize', this.updateScreenWidth);
            },
            methods: {
                updateScreenWidth() {
                    this.screenWidth = window.innerWidth;
                },
                toggleFilters() {
                    this.filtersVisible = !this.filtersVisible;
                },
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
                            this.loading = false
                            //console.log(this.show_tables_info)
                        })
                },
                // ShowDialogDelete(item) {
                //     this.kod_org = item.idlistedu
                //     this.level_org = item.level
                //     this.dialog_delete = true
                // },
                // ShowDialogChange(item) {
                //     this.kod_org = item.idlistedu
                //     this.dialog_id_parent = item.id_parent
                //     this.dialog_name_human = item.name_human
                //     this.dialog_name = item.name
                //     this.dialog_name_small = item.name_small
                //     this.dialog_id_region = item.id_region
                //     this.dialog_region = item.region
                //     this.dialog_kbkcode = item.kbkcode
                //     this.dialog_kbkname = item.kbkname
                //     this.dialog_establishmentkindname = item.establishmentkindname
                //     this.dialog_org_type = item.org_type
                //     this.dialog_level = item.level
                //     this.dialog_id_napr = item.id_napr
                //     this.dialog_orgtypename = item.orgtypename
                //     this.dialog_budgetlvlname = item.budgetlvlname
                //     this.dialog_inn = item.inn
                //     this.dialog_kpp = item.kpp
                //     this.dialog_address = item.address
                //     this.dialog_change = true
                // },
                // async ChangeData() {
                //     if (this.$refs.form.validate()) {
                //         let data = new FormData()
                //         data.append('kod_org', this.kod_org)
                //         data.append('dialog_id_parent', this.dialog_id_parent)
                //         data.append('dialog_name_human', this.dialog_name_human)
                //         data.append('dialog_name', this.dialog_name)
                //         data.append('dialog_name_small', this.dialog_name_small)
                //         data.append('dialog_id_region', this.dialog_id_region)
                //         data.append('dialog_region', this.dialog_region)
                //         data.append('dialog_kbkcode', this.dialog_kbkcode)
                //         data.append('dialog_kbkname', this.dialog_kbkname)
                //         data.append('dialog_establishmentkindname', this.dialog_establishmentkindname)
                //         data.append('dialog_org_type', this.dialog_org_type)
                //         data.append('dialog_level', this.dialog_level)
                //         data.append('dialog_id_napr', this.dialog_id_napr)
                //         data.append('dialog_orgtypename', this.dialog_orgtypename)
                //         data.append('dialog_budgetlvlname', this.dialog_budgetlvlname)
                //         data.append('dialog_inn', this.dialog_inn)
                //         data.append('dialog_kpp', this.dialog_kpp)
                //         data.append('dialog_address', this.dialog_address)
                //         await fetch('ChangeData', {
                //             method: 'post',
                //             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                //             body: data
                //         })
                //         this.kod_org = '';
                //         await this.ShowUnitedTable();
                //         await this.ShowFilteredTable();
                //         this.dialog_change = false;
                //     }
                // },
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
