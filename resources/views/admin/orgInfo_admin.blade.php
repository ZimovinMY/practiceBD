@extends('sample')

@section('title')
    Дополнительная информация
@endsection

@section('content')
    <div id="SecondPage">
        <v-app>
            <v-main>
                <v-row>
                    <v-col
                        cols="10"
                    >
                        <b><h4 class="mb-0 mt-3 pl-10">Подробная информация об организации: {{ $info[0]->name_human }}</h4></b>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col
                        cols="5"
                    >
                        <v-card class="ml-4">
                            <v-list dense>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                        cols="5"
                                    >
                                        <v-list-item-content>Код МЭИ организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->idlistedu }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                        cols="5"
                                    >
                                    <v-list-item-content>Код МЭИ головной организации</v-list-item-content>
                                    </v-col>
                                        <v-list-item-content class="align-end">
                                        {{ $info[0]->id_parent }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Идентификатор ГИВЦ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->id_givc }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код организации по Сводному реестру</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->id_rubpnubp }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код уровеня организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->id_level }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код типа организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->orgtypecode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код типа учреждения</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->establishmentkindcode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ОГРН организации ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->ogrn }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ОГРН организации РУБПНУБП</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->ogrn_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код статуса записи в ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kod_status_egrul }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Статус записи в ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->status_egrul }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Дата прекращения деятельности ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->date_remove }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Дата обновления ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->egrul_updated }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Номер реестровой записи</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->recordnum_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Дата постановки на учет в ФНС</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->date_start_egrul }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код статуса организации РУБПНУБП</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kod_status_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код уровня бюджета</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->budgetlvlcode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                        cols="5"
                                    >
                                    <v-list-item-content>Дата включения организации в Сводный реестр</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->inclusiondate }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                        cols="5"
                                    >
                                    <v-list-item-content>Код ОКОПФ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->opf_code }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код бюджета</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->budgetcode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Наименование бюджета</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->budgetname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код способа образования</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->code_spobul }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Наименование способа образования</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_spobul }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Метка о реорганизации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->is_reorg }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Дата создания организации МОН</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->org_create_date }}
                                    </v-list-item-content>
                                </v-list-item>
                                <v-col
                                    class="d-flex align-center justify-end py-2"
                                >
                                    <v-btn
                                        color="red darken-1"
                                        small
                                        outlined
                                        @click="ChangeTable1"
                                        class="my-0 mr-0"
                                    >
                                        Редактировать
                                    </v-btn>
                                </v-col>

                            </v-list>
                        </v-card>
                        <v-card class="ml-4 mt-8">
                            <v-list dense>
                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Код субъекта</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->id_region }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Наименование субъекта</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_region }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Часовой пояс</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->tz }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Адрес</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->address }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Номер телефона организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->phone }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Web-сайт</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->site }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>E-Mail</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->mail }}
                                    </v-list-item-content>
                                </v-list-item>
                                <v-col
                                    class="d-flex align-center justify-end py-2"
                                >
                                    <v-btn
                                        color="red darken-1"
                                        small
                                        outlined
                                        @click="ChangeTable2"
                                        class="my-0 mr-0"
                                    >
                                        Редактировать
                                    </v-btn>
                                </v-col>
                            </v-list>
                        </v-card>
                    </v-col>
                    <v-col
                        cols="7"
                    >
                        <v-card class="mx-2">
                            <v-list dense>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Код учредителя</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->id_spr_min }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Наименование учредителя</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_spr_min }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Наименование учредителя ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->egrul_uchred }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Полное наименование организации ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Полное наименование организации РУБПНУБП</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Сокращенное наименование организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->shortname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Сокращенное наименование организации ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_abb }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Наименование для отчетов</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_small }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Наименование для АККСУФ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_human }}
                                    </v-list-item-content>
                                </v-list-item>
                                <v-col
                                    class="d-flex align-center justify-end py-2"
                                >
                                    <v-btn
                                        color="red darken-1"
                                        small
                                        outlined
                                        @click="ChangeTable3"
                                        class="my-0 mr-0"
                                    >
                                        Редактировать
                                    </v-btn>
                                </v-col>
                            </v-list>
                        </v-card>
                        <v-card class="mx-2 mt-8">
                            <v-list dense>
                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ОКПО / Идентификационный номер ТОСП</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->okpo }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ИНН организации (ЕГРЮЛ)</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->inn }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ИНН организации (РУБПНУБП)</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->inn_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>КПП организации (ЕГРЮЛ)</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kpp }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>КПП организации (РУБПНУБП)</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kpp_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ОКВЭД основной</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->okved }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Наименование ОКВЭД основной</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->okvedname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код ГРБС</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kbkcode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ГРБС</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kbkname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код ОКФС</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->okfs }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ОКФС</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->okfsname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код территории населенного пункта по ОКТМО</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->oktmo }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Наименование территории населенного пункта по ОКТМО</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->oktmoname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код по КОФК территориального органа Федерального казначейства по месту нахождения организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kofkcode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Классификация по деятельности</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->org_type }}
                                    </v-list-item-content>
                                </v-list-item>
                                <v-col
                                    class="d-flex align-center justify-end py-2"
                                >
                                    <v-btn
                                        color="red darken-1"
                                        small
                                        outlined
                                        @click="ChangeTable4"
                                        class="my-0 mr-0"
                                    >
                                        Редактировать
                                    </v-btn>
                                </v-col>
                            </v-list>
                        </v-card>
                        <v-card class="mx-2 mt-8">
                            <v-list dense>
                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>ФИО руководителя организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        @php
                                            $heads = json_decode($info[0]->heads, true); // Преобразование JSON-строки в ассоциативный массив
                                        @endphp

                                        @if(isset($heads[0]['fio']))
                                            {{ $heads[0]['fio'] }} <!-- Отображение только значения "fio" -->
                                        @endif
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Должность</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        @if(isset($heads[0]['post']))
                                            {{ $heads[0]['post'] }} <!-- Отображение только значения "fio" -->
                                        @endif
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Документ о назначении</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        @if(isset($heads[0]['docName']))
                                            {{ $heads[0]['docName'] }} <!-- Отображение только значения "fio" -->
                                        @endif
                                    </v-list-item-content>
                                </v-list-item>
                                <v-col
                                    class="d-flex align-center justify-end py-2"
                                >
                                    <v-btn
                                        color="red darken-1"
                                        small
                                        outlined
                                        @click="ChangeTable5"
                                        class="my-0 mr-0"
                                    >
                                        Редактировать
                                    </v-btn>
                                </v-col>
                            </v-list>
                        </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col
                        cols="12"
                    >
                        <div v-if="{{ $info[0]->idlistedu }} == {{ $info[0]->id_parent }}">

                                @if(!empty($info_branches))
                                    <v-list>
                                        <v-subheader><h5>Филиалы организации:</h5></v-subheader>
                                        @foreach($info_branches as $data)
                                            <v-list-item :href="'../orgadmin/{{$data->idlistedu}}'"
                                            >
                                                <i class="mr-2 mdi mdi-chevron-right"></i> {{$data->name}}
                                            </v-list-item>
                                       @endforeach
                                    </v-list>
                                @endif
                                @if(empty($info_branches))
                                    <v-card>
                                        Филиалов нет
                                    </v-card>
                                @endif
                        </div>
                    </v-col>
                </v-row>
                <v-dialog
                    v-model="dialog_change1"
                    width="800"
                >
                    <v-card>
                        <v-card-title class="text-h5 grey lighten-2">
                            Изменение данных
                        </v-card-title>
                        <v-card-text class="mt-3 pb-0">
                            <v-form ref="form">
                                <v-container>
                                    <v-row>


                                        <v-col
                                            cols="12"
                                            sm="4"
                                        >
                                            <v-autocomplete
                                                v-model="dialog_idlistedu"
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
            </v-main>
        </v-app>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        new Vue({
            el: '#SecondPage',
            vuetify: new Vuetify(),
            data() {
                return {
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

                    dialog_change1: false,
                    dialog_change2: false,
                    dialog_change3: false,
                    dialog_change4: false,
                    dialog_change5: false,
                }
            },
            methods: {
                ChangeTable1() {
                    // console.log();
                    this.dialog_id_parent = {{ $info[0]->id_parent }}
                    this.dialog_id_givc = {{ $info[0]->id_givc }}
                    this.dialog_id_rubpnubp = {{ $info[0]->id_rubpnubp }}
                    this.dialog_id_level = {{ $info[0]->id_level }}
                    this.dialog_orgtypecode = {{ $info[0]->orgtypecode }}
                    this.dialog_establishmentkindcode = {{ $info[0]->establishmentkindcode }}
                    this.dialog_ogrn = {{ $info[0]->ogrn }}
                    this.dialog_ogrn_rub = {{ $info[0]->ogrn_rub }}
                    this.dialog_kod_status_egrul = {{ $info[0]->kod_status_egrul }}
                    this.dialog_status_egrul = {{ $info[0]->status_egrul }}
                    this.dialog_date_remove = {{ $info[0]->date_remove }}
                    this.dialog_egrul_updated = {{ $info[0]->egrul_updated }}
                    this.dialog_recordnum_rub = {{ $info[0]->recordnum_rub }}
                    this.dialog_date_start_egrul = {{ $info[0]->date_start_egrul }}
                    this.dialog_kod_status_rub = {{ $info[0]->kod_status_rub }}
                    this.dialog_budgetlvlcode = {{ $info[0]->budgetlvlcode }}
                    this.dialog_inclusiondate = {{ $info[0]->inclusiondate }}
                    this.dialog_opf_code = {{ $info[0]->opf_code }}
                    this.dialog_budgetcode = {{ $info[0]->budgetcode }}
                    this.dialog_budgetname = {{ $info[0]->budgetname }}
                    this.dialog_code_spobul = {{ $info[0]->code_spobul }}
                    this.dialog_name_spobul = {{ $info[0]->name_spobul }}
                    this.dialog_is_reorg = {{ $info[0]->is_reorg }}
                    this.dialog_org_create_date = {{ $info[0]->org_create_date }}
                    this.dialog_change1 = true
                },
                ChangeTable2() {
                    this.dialog_change2 = true
                },
                ChangeTable3() {
                    this.dialog_change3 = true
                },
                ChangeTable4() {
                    this.dialog_change4 = true
                },
                ChangeTable5() {
                    this.dialog_change4 = true
                },
            },
            mounted: function () {
            },
        })
    </script>
@endsection
