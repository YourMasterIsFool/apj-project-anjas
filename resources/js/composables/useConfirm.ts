// composables/useConfirm.ts
import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
} from '@/components/ui/alert-dialog';
import { createVNode, h, ref, render } from 'vue';

export function useConfirm() {
    return (message: string, title = 'Delete Confirmation') =>
        new Promise<boolean>((resolve) => {
            const open = ref(true);

            const vnode = createVNode(() =>
                h(
                    AlertDialog,
                    { open: open.value },
                    {
                        default: () =>
                            h(AlertDialogContent, {}, [
                                h(AlertDialogHeader, {}, [
                                    h(AlertDialogTitle, {}, title),
                                    h(AlertDialogDescription, {}, message),
                                ]),
                                h(AlertDialogFooter, {}, [
                                    h(
                                        AlertDialogCancel,
                                        {
                                            onClick: () => {
                                                open.value = false;
                                                render(null, container);
                                                resolve(false);
                                            },
                                        },
                                        () => 'Batal',
                                    ),
                                    h(
                                        AlertDialogAction,
                                        {
                                            onClick: () => {
                                                open.value = false;
                                                render(null, container);
                                                resolve(true);
                                            },
                                            class: 'bg-red-500 text-white px-6 hover:bg-opacity-80 transition-all duration-300 cursor-pointer',
                                        },
                                        () => 'Ya',
                                    ),
                                ]),
                            ]),
                    },
                ),
            );

            const container = document.createElement('div');
            document.body.appendChild(container);
            render(vnode, container);
        });
}
