<script lang="ts" setup>
import AppLayout from '@/layouts/AppLayout.vue';
import MainCard from '@/components/commons/main-card/MainCard.vue';

import FormInput from '@/components/commons/form-input/FormInput.vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'

import { useJalan } from '../composable/useJalan'

const {
    onSubmit, form, title,
} = useJalan();

</script>
<template>
    <AppLayout>
        <MainCard :title="title">
            <template #main>
                <div class="bg-muted/40 w-full">
                    <Card class="w-full  shadow-sm border border-border/40">
                        <CardHeader>
                            <CardTitle class="text-lg font-semibold">Data Jalan</CardTitle>
                        </CardHeader>

                        <CardContent>
                            <form @submit.prevent="onSubmit" class="grid grid-cols-2 gap-4">
                                <!-- Nama Jalan -->

                                <div class="col-span-2 space-y-1">
                                    <FormInput label="Nama Jalan" placeholder="Insert nama jalan.." name="nama_jalan"
                                        :form="form" />
                                </div>

                                <div class="col-span-2 space-y-1">
                                    <FormInput label="Koden Jalan" placeholder="Insert Kode jalan.." name="kode_jalan"
                                        :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormInput label="Kelas Jalan" placeholder="Insert Kelas jalan.." name="kelas_jalan"
                                        :form="form" />
                                </div>
                                <!-- Panjang Jalan -->
                                <div class="space-y-1 col-span-2">
                                    <FormInput type="number" label="Panjang Jalan" placeholder="Insert panjang jalan.."
                                        name="panjang_jalan" :form="form" />
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
