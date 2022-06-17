import { Inertia } from '@inertiajs/inertia'
import { usePage } from '@inertiajs/inertia-react'
import { useConfig } from '@/stores/config'
import Button from '@/components/Button'
import Message from '@/components/Message'
import style from './style.module.scss'

type Props = {
    name?: string
    action: string
    type?: 'add' | 'auth'
    children: React.ReactNode
}

export default function NewClient(props: Props) {
    const { error, success, form } = useConfig(({config}) => config.message)
    const { url } = usePage()

    // Used in pages where two or more form are displayed
    // At this point, only in login page
    const explicitForm = (url === '/login' && form) ? form === props.name : true

    const submit = (event: React.FormEvent<HTMLFormElement>) => {
        event.preventDefault()
        const data = new FormData(event.currentTarget)

        Inertia.post(props.action || '', data)
    }
    return (
        <form
            className={`${props.type === 'auth' && style.auth} ${style.form}`}
            action={props.action}
            method="POST"
            onSubmit={submit}>

            {(explicitForm && error) && <Message text={error} type="error"/>}
            {(explicitForm && success) && <Message text={success} type="success"/>}

            {props.children}

            <Button type="submit">{props.name}</Button>
        </form>
    )
}