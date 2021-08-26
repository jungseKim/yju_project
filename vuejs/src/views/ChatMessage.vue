<template>
    <div>
        <div>
            <strong>{{ message.writer.name }} time: {{ message.created_at.slice(5,10) }}</strong>
        </div>
        <div>
            {{ message.text }}
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            message: {
                type: Object,
                required: true
            }
        }
    }
</script>