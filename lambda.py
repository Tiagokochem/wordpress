import boto3
import json

# Inicializa o cliente SES
client = boto3.client('ses', region_name='us-east-1')

# Função lambda para enviar e-mail
enviar_email = lambda: client.send_email(
    Source='seuemail@dominio.com',
    Destination={
        'ToAddresses': [
            'destinatario@dominio.com'
        ]
    },
    Message={
        'Subject': {
            'Data': 'Assunto do E-mail',
            'Charset': 'UTF-8'
        },
        'Body': {
            'Text': {
                'Data': 'Corpo do e-mail em formato de texto.',
                'Charset': 'UTF-8'
            }
        }
    }
)

def lambda_handler(event, context):
    # """
    # Função Lambda principal que chama a função lambda enviar_email.
    # """
    try:
        resposta = enviar_email()
        print("E-mail enviado com sucesso:", resposta)
        return {
            'statusCode': 200,
            'body': json.dumps("E-mail enviado com sucesso.")
        }
    except Exception as e:
        print("Erro ao enviar e-mail:", str(e))
        return {
            'statusCode': 500,
            'body': json.dumps("Falha ao enviar e-mail.")
        }
