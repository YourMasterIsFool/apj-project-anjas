<script lang="ts" setup>
import AppLayout from '@/layouts/AppLayout.vue';
import MainCard from '@/components/commons/main-card/MainCard.vue';

import FormInput from '@/components/commons/form-input/FormInput.vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { useTraffic } from '../composable/useTraffic';
import FormSelect from '@/components/commons/form-select/FormSelect.vue';
import { IGeneralDataEmbed } from '@/types/generalDataEmbed';
import AsyncSelect from '@/components/commons/async-select/AsyncSelect.vue';
const {
    onSubmit, form, title,
    list_pengaturan_fase,
    list_lampu,
    list_kondisi,
    list_jalan,
    list_lokasi
} = useTraffic();

</script>
<template>
    <AppLayout>
        <MainCard :title="title">
            <template #main>
                <div class="bg-muted/40 w-full">
                    <Card class="w-full  shadow-sm border border-border/40">
                        <CardHeader>
                            <CardTitle class="text-lg font-semibold">Data Traffic</CardTitle>
                        </CardHeader>

                        <CardContent>
                            <form @submit.prevent="onSubmit" class="grid grid-cols-2 gap-4">
                                <!-- Nama Traffic -->
                                <div class="col-span-2 space-y-1">
                                    <AsyncSelect :error="form.errors.jalan_id" label="Pilih Jalan"
                                        :value="form.jalan_id"
                                        @update:model-value="(value) => form.jalan_id = Number(value?.value)" :options="list_jalan.map((item) => ({
                                            value: item.id.toString(),
                                            name: item.nama_jalan
                                        }))" />
                                </div>

                                <div class="col-span-2 space-y-1">
                                    <FormInput label="Kode" placeholder="Insert Kode" name="kode" :form="form" />
                                </div>

                                <div class="col-span-2 space-y-1">
                                    <FormInput label="Jenis Simpang" placeholder="Jenis Simpang" name="jenis_simpang"
                                        :form="form" />
                                </div>

                                <div class="col-span-2 space-y-1">
                                    <FormSelect :can-nullable="true" @on-change="(value: IGeneralDataEmbed) => {
                                        form.lokasi = value ? value.value : null
                                    }" placeholder="Pilih Lokasi " :value="form.lokasi ? form.lokasi.toString() : null"
                                        :options="list_lokasi" label="Lokasi" />
                                    <!-- <FormInput label="Lokasi" placeholder="Lokasi" name="lokasi" :form="form" /> -->
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormInput label="Tahun Pemasangan" type="number" placeholder="Tahun Pemasangan"
                                        name="tahun_pemasangan" :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormInput label="Latitude" type="text" placeholder="Latitude" name="latitude"
                                        :form="form" />
                                </div>
                                <div class="space-y-1 col-span-2">
                                    <FormInput label="Longitude" type="text" placeholder="Longitude" name="longitude"
                                        :form="form" />
                                </div>
                                <!-- Panjang Traffic -->
                                <div class="space-y-1 col-span-2">
                                    <FormSelect :can-nullable="true" @on-change="(value: IGeneralDataEmbed) => {
                                        form.pengaturan_fase = value.value ? Number(value.value) : undefined
                                    }" placeholder="Pilih Pengaturan Fase"
                                        :value="form.pengaturan_fase ? form.pengaturan_fase.toString() : null"
                                        :options="list_pengaturan_fase" label="Pengaturan Fase" />
                                    <!-- <FormInput type="text" label="Pengaturan Fase" placeholder="Pengaturan fase "
                                        name="pengaturan_fase" :form="form" /> -->
                                </div>
                                <div class="space-y-1 col-span-2">
                                    <FormInput type="text" label="Tipe Tiang" placeholder="Tipe Tiang" name="tipe_tiang"
                                        :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <p>
                                        Data Kondisi Lampu
                                    </p>
                                    <ul class="grid grid-cols-1 gap-2">
                                        <li class="flex items-center space-x-2" v-for="(lampu, index) in list_lampu"
                                            :key="lampu">
                                            <label>
                                                {{ lampu }}
                                            </label>
                                            <span>
                                                :
                                            </span>
                                            <FormInput type="number" placeholder="Durasi"
                                                :name="`list_lampu.${index}.durasi`" :form="form" />
                                        </li>
                                    </ul>
                                </div>
                                <div class="space-y-1 col-span-2">
                                    <FormSelect :can-nullable="true" @on-change="(value) => form.kondisi = value?.value"
                                        placeholder="Pilih Kondisi"
                                        :value="form.kondisi ? form.kondisi.toString() : null" :options="list_kondisi"
                                        label="Kondisi" />
                                </div>
                                <div class="space-y-1 col-span-2">
                                    <FormInput type="text" label="Keterangan" placeholder="Keterangan" name="keterangan"
                                        :form="form" />
                                </div>

                                <!-- Button -->
                                <div class="col-span-2 flex justify-end pt-2">
                                    <Button type="submit" class="px-6" :disabled="form.processing">
                                        {{ form.processing ? 'Menyimpan...' : 'Simpan' }}
                                    </Button>
                                </div>
                            </form>
                        </CardContent>
                    </Card>
                </div>
            </template>
        </MainCard>
    </AppLayout>
    <div>

    </div>
</template>
