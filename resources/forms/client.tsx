import type { Client } from '$/types/client'

export default function ClientForm(props?: Partial<Client>) {
    const { id, name, email } = props || {}

    return (
        <fieldset>
            <legend><h2>Client Info</h2></legend>
            {id && <input type="text" name="id" value={id} readOnly hidden/>}

            <label htmlFor="name">Name:</label>
            <input type="text" name="name" id="name" defaultValue={name}/>

            <label htmlFor="email">Email:</label>
            <input type="email" name="email" id="email" defaultValue={email}/>
        </fieldset>
    )
}