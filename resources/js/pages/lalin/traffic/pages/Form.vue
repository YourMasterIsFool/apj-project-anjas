<script lang="ts" setup>
import AppLayout from '@/layouts/AppLayout.vue';
import MainCard from '@/components/commons/main-card/MainCard.vue';

import FormInput from '@/components/commons/form-input/FormInput.vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { useTraffic } from '../composable/useTraffic';


const {
    onSubmit, form, title,
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
                                    <FormInput label="Kode" placeholder="Insert Kode" name="kode" :form="form" />
                                </div>

                                <div class="col-span-2 space-y-1">
                                    <FormInput label="Jenis Simpang" placeholder="Jenis Simpang" name="jenis_simpang"
                                        :form="form" />
                                </div>

                                <div class="col-span-2 space-y-1">
                                    <FormInput label="Lokasi" placeholder="Lokasi" name="lokasi" :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormInput label="Tahun Pemasangan" type="number" placeholder="Tahun Pemasangan"
                                        name="tahun_pemasangan" :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormInput label="Latitude" type="number" placeholder="Latitude" name="latitude"
                                        :form="form" />
                                </div>
                                <div class="space-y-1 col-span-2">
                                    <FormInput label="Longitude" type="number" placeholder="Longitude" name="longitude"
                                        :form="form" />
                                </div>
                                <!-- Panjang Traffic -->
                                <div class="space-y-1 col-span-2">
                                    <FormInput type="text" label="Pengaturan Fase" placeholder="Pengaturan fase "
                                        name="pengaturan_fase" :form="form" />
                                </div>
                                <div class="space-y-1 col-span-2">
                                    <FormInput type="text" label="Tipe Tiang" placeholder="Tipe Tiang" name="tipe_tiang"
                                        :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormInput type="text" label="Durasi" placeholder="Durasi .." name="durasi"
                                        :form="form" />
                                </div>
                                <div class="space-y-1 col-span-2">
                                    <FormInput type="text" label="Kondisi" placeholder="Kondisi" name="kondisi"
                                        :form="form" />
                                </div>
                                <div class="space-y-1 col-span-2">
                                    <FormInput type="text" label="Keterangang" placeholder="Keterangan"
                                        name="keterangan" :form="form" />
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
