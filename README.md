# 🦺 SST Control

## Plataforma SaaS para Gestão de Saúde e Segurança do Trabalho

> **Status: 🚧 Em desenvolvimento**

O **SST Control** é uma plataforma **SaaS (Software as a Service)** em desenvolvimento, destinada à gestão digital de processos de **Saúde e Segurança do Trabalho (SST)**, inspeções, auditorias, checklists, não conformidades, planos de ação e indicadores.

O projeto tem como objetivo centralizar informações de SST em uma única plataforma, proporcionando **padronização, rastreabilidade, controle operacional e geração de indicadores para apoio à tomada de decisão**.

---

## 📌 Visão do Projeto

O SST Control está sendo projetado como uma solução **multi-tenant**, permitindo que diferentes empresas utilizem a mesma plataforma com isolamento lógico de seus respectivos dados.

A plataforma será construída inicialmente como uma aplicação web, com arquitetura preparada para futura expansão para dispositivos móveis, integração com ferramentas de Business Intelligence e recursos de Inteligência Artificial.

### Fluxo conceitual

```text
                    SST CONTROL
                         │
          ┌──────────────┼──────────────┐
          │              │              │
     CHECKLISTS      INSPEÇÕES       AUDITORIAS
          │              │              │
          └──────────────┼──────────────┘
                         │
                         ▼
                NÃO CONFORMIDADES
                         │
                         ▼
                  PLANOS DE AÇÃO
                       (5W2H)
                         │
                         ▼
                    EVIDÊNCIAS
                         │
                         ▼
                    INDICADORES
                         │
              ┌──────────┴──────────┐
              ▼                     ▼
           DASHBOARD              BI / IA
```

---

# 🎯 Objetivos

O sistema tem como principais objetivos:

* Digitalizar processos de inspeção de SST.
* Padronizar checklists e auditorias.
* Centralizar registros de inspeções.
* Registrar e acompanhar não conformidades.
* Automatizar a criação de planos de ação.
* Utilizar metodologia **5W2H** para tratamento das ações.
* Armazenar evidências e documentos.
* Garantir rastreabilidade das operações.
* Disponibilizar indicadores gerenciais.
* Permitir análises por empresa, unidade, setor e período.
* Preparar a plataforma para operação offline em dispositivos móveis.
* Permitir futuras integrações com BI, APIs externas e Inteligência Artificial.

---

# 🚨 Problema

Processos de SST frequentemente utilizam diferentes ferramentas para registrar e acompanhar atividades:

```text
Excel
   ↓
Formulários
   ↓
Documentos
   ↓
E-mails
   ↓
Aplicativos de mensagens
   ↓
Relatórios manuais
```

Essa fragmentação pode dificultar:

* rastreabilidade;
* padronização;
* acompanhamento de prazos;
* controle de responsáveis;
* consolidação de informações;
* geração de indicadores;
* identificação de reincidências.

O SST Control busca centralizar essas informações em uma plataforma única.

---

# 💡 Proposta de Solução

A plataforma permitirá que uma organização realize o ciclo completo:

```text
Criar Checklist
       ↓
Publicar
       ↓
Executar Inspeção
       ↓
Registrar Respostas
       ↓
Identificar Não Conformidades
       ↓
Criar Plano de Ação
       ↓
Definir Responsável e Prazo
       ↓
Acompanhar Tratamento
       ↓
Validar
       ↓
Encerrar
       ↓
Gerar Indicadores
```

---

# 🧩 Principais Módulos

## 1. Gestão de Usuários

* Cadastro de usuários.
* Autenticação.
* Perfis de acesso.
* Controle de permissões.
* RBAC — Role-Based Access Control.
* Ativação e desativação de usuários.

---

## 2. Gestão Organizacional

Estrutura hierárquica:

```text
Empresa
   │
   ├── Regional
   │      │
   │      └── Unidade
   │             │
   │             ├── Setor
   │             └── Área
```

---

## 3. Construtor de Checklists

O sistema deverá permitir a criação de checklists dinâmicos contendo diferentes tipos de perguntas:

* Conforme / Não Conforme;
* Sim / Não;
* Texto;
* Texto longo;
* Número;
* Data;
* Seleção única;
* Múltipla escolha;
* Foto;
* Arquivo;
* Assinatura.

Também será possível configurar regras condicionais.

### Exemplo

```text
Pergunta:

O extintor está disponível?

( ) Conforme
( ) Não Conforme

        ↓

Se "Não Conforme":

[Obrigar fotografia]

[Obrigar justificativa]

[Gerar Não Conformidade]
```

---

# 🔍 Inspeções

O módulo de inspeções permitirá:

* selecionar checklist;
* selecionar unidade;
* selecionar setor;
* selecionar responsável;
* executar checklist;
* registrar respostas;
* anexar evidências;
* salvar progresso;
* finalizar inspeção;
* consultar histórico.

---

# ⚠️ Gestão de Não Conformidades

As não conformidades poderão ser geradas manualmente ou automaticamente a partir de regras configuradas no checklist.

Informações previstas:

* título;
* descrição;
* categoria;
* gravidade;
* prioridade;
* origem;
* responsável;
* prazo;
* status;
* evidências;
* histórico.

### Status

```text
ABERTA
   ↓
EM ANÁLISE
   ↓
EM TRATAMENTO
   ↓
AGUARDANDO VALIDAÇÃO
   ↓
CONCLUÍDA
   ↓
ENCERRADA
```

---

# 📋 Planos de Ação — 5W2H

O sistema deverá permitir o tratamento das não conformidades através de planos de ação.

### 5W2H

| Elemento | Descrição               |
| -------- | ----------------------- |
| What     | O que será realizado?   |
| Why      | Por que será realizado? |
| Where    | Onde será realizado?    |
| When     | Quando será realizado?  |
| Who      | Quem será responsável?  |
| How      | Como será realizado?    |
| How Much | Qual o custo estimado?  |

O sistema também deverá controlar:

* responsáveis;
* prazos;
* status;
* evidências;
* validação;
* atrasos.

---

# 📷 Evidências

O sistema deverá permitir anexar evidências relacionadas às inspeções e não conformidades.

Tipos previstos:

* fotografias;
* documentos;
* PDFs;
* arquivos;
* assinaturas.

Os arquivos serão armazenados em **Object Storage**, enquanto os metadados serão mantidos no banco de dados.

---

# 📊 Dashboard e Indicadores

O SST Control deverá disponibilizar indicadores como:

* quantidade de inspeções realizadas;
* inspeções pendentes;
* índice de conformidade;
* não conformidades abertas;
* não conformidades críticas;
* planos de ação vencidos;
* ações em andamento;
* desempenho por unidade;
* desempenho por setor;
* reincidência de não conformidades.

---

# 📄 Relatórios

Está prevista a geração e exportação de informações nos formatos:

* PDF;
* XLSX;
* CSV.

Os relatórios poderão utilizar filtros como:

```text
Período
Empresa
Regional
Unidade
Setor
Checklist
Responsável
Status
Gravidade
Categoria
```

---

# 🤖 Inteligência Artificial

A utilização de IA será planejada para fases posteriores do projeto.

Possíveis funcionalidades:

### Busca em linguagem natural

Exemplo:

> "Mostre as inspeções com não conformidades críticas realizadas no último mês."

### Análise de reincidência

Identificação de padrões relacionados a não conformidades recorrentes.

### Análise preditiva

Estimativa de áreas ou processos com maior probabilidade de reincidência.

### Visão computacional

Possível análise automatizada de evidências fotográficas em cenários específicos, sempre como recurso de apoio e sujeito à validação humana.

---

# 📱 Aplicativo Mobile

Em uma etapa posterior será desenvolvido um aplicativo para execução de inspeções em campo.

A arquitetura deverá permitir funcionamento **Offline-First**:

```text
                APLICATIVO
                    │
                    ▼
              SQLite Local
                    │
              Sem Internet
                    │
                    ▼
             Fila de Dados
                    │
          Internet Disponível
                    │
                    ▼
                 API
                    │
                    ▼
              PostgreSQL
```

Possíveis recursos:

* execução offline;
* sincronização automática;
* câmera;
* GPS;
* assinatura;
* evidências;
* marcação temporal.

---

# 🏗️ Arquitetura

A arquitetura inicial será baseada em um **Monólito Modular**, evitando a complexidade prematura de uma arquitetura de microsserviços.

```text
                     FRONTEND
                   React + TS
                        │
                        ▼
                     FastAPI
                        │
          ┌─────────────┼─────────────┐
          │             │             │
          ▼             ▼             ▼
     SQLAlchemy       Redis        Celery
          │             │             │
          ▼             │             ▼
     PostgreSQL         │       Processamento
                        │       assíncrono
                        │
                        ▼
                  Object Storage
```

A arquitetura poderá evoluir conforme o crescimento da plataforma.

---

# 🛠️ Tecnologias

## Backend

* **Python**
* **FastAPI**
* **SQLAlchemy**
* **Alembic**
* **Pydantic**

## Banco de Dados

* **PostgreSQL**

## Cache e processamento

* **Redis**
* **Celery**

## Frontend

* **React**
* **TypeScript**

## Mobile — futuro

* **React Native**

## Testes

* **Pytest**

## DevOps

* **Docker**
* **Docker Compose**
* **GitHub Actions**

## Dados e Analytics

* **Pandas**
* **Polars**
* **Scikit-learn**
* **Power BI**

## Controle de versão

* **Git**
* **GitHub**

---

# 🔐 Segurança

A segurança será considerada desde as primeiras etapas da engenharia de software.

Entre os mecanismos previstos:

* autenticação segura;
* autorização baseada em RBAC;
* isolamento entre tenants;
* hash seguro de senhas;
* gerenciamento de sessões;
* validação de entrada;
* proteção contra SQL Injection;
* controle de acesso;
* logs;
* auditoria;
* gerenciamento de secrets;
* backups;
* HTTPS em produção;
* princípio do menor privilégio.

O projeto também considerará requisitos relacionados à **LGPD**, especialmente no tratamento de dados pessoais.

---

# 🏢 Arquitetura Multi-Tenant

O SST Control será projetado como SaaS multi-tenant.

Conceitualmente:

```text
                    SST CONTROL
                         │
          ┌──────────────┼──────────────┐
          │              │              │
       Empresa A      Empresa B      Empresa C
          │              │              │
       Dados A         Dados B         Dados C
```

Cada empresa deverá possuir isolamento lógico de seus dados através do conceito de `tenant_id`.

Posteriormente poderá ser avaliada a utilização de mecanismos adicionais do PostgreSQL para reforçar o isolamento.

---

# 🗂️ Estrutura Inicial do Projeto

```text
sst-control/
│
├── app/
│   ├── main.py
│   │
│   ├── core/
│   │   ├── config.py
│   │   ├── security.py
│   │   └── database.py
│   │
│   ├── modules/
│   │   ├── auth/
│   │   ├── tenants/
│   │   ├── users/
│   │   ├── organizations/
│   │   ├── checklists/
│   │   ├── inspections/
│   │   ├── findings/
│   │   ├── action_plans/
│   │   ├── evidences/
│   │   ├── reports/
│   │   ├── dashboards/
│   │   └── audit/
│   │
│   ├── shared/
│   │   ├── exceptions/
│   │   ├── pagination/
│   │   └── utils/
│   │
│   └── workers/
│
├── tests/
├── migrations/
├── docs/
├── docker/
│
├── .env.example
├── docker-compose.yml
├── pyproject.toml
└── README.md
```

---

# 🧪 Estratégia de Testes

O projeto deverá utilizar testes automatizados durante o desenvolvimento.

Serão considerados:

* testes unitários;
* testes de integração;
* testes de API;
* testes de autenticação;
* testes de autorização;
* testes de isolamento entre tenants;
* testes de regras de negócio;
* testes de regressão.

---

# 🛣️ Roadmap

O desenvolvimento será realizado de forma incremental.

```text
FASE 0
Engenharia de Software
       ↓
FASE 1
Engenharia de Requisitos
       ↓
FASE 2
Arquitetura do Sistema
       ↓
FASE 3
Modelagem do Banco de Dados
       ↓
FASE 4
Backend / API
       ↓
FASE 5
Autenticação + Multi-Tenancy
       ↓
FASE 6
Checklist Builder
       ↓
FASE 7
Inspeções
       ↓
FASE 8
Não Conformidades + 5W2H
       ↓
FASE 9
Evidências + Auditoria
       ↓
FASE 10
Dashboard + Relatórios
       ↓
FASE 11
Frontend
       ↓
FASE 12
Aplicativo Mobile
       ↓
FASE 13
Analytics + IA
       ↓
FASE 14
CI/CD + Deploy
```

---

# 📚 Documentação

A documentação do projeto será desenvolvida paralelamente ao software.

Documentos previstos:

```text
docs/
│
├── 01-visao-do-produto/
├── 02-requisitos/
├── 03-regras-de-negocio/
├── 04-casos-de-uso/
├── 05-arquitetura/
├── 06-banco-de-dados/
├── 07-api/
├── 08-seguranca/
├── 09-testes/
├── 10-devops/
└── 11-deploy/
```

---

# 🚧 Status do Projeto

**O SST Control está atualmente em fase de Engenharia de Software e definição dos requisitos.**

O sistema **ainda não está pronto para produção**.

As funcionalidades, arquitetura e tecnologias apresentadas neste README representam o planejamento atual e poderão sofrer alterações durante o processo de desenvolvimento.

---

# 🎯 Objetivo do Desenvolvimento

Além da construção de uma solução SaaS para gestão de SST, o projeto tem como objetivo aplicar, de forma prática, conceitos de:

* Engenharia de Software;
* Engenharia de Requisitos;
* Arquitetura de Sistemas;
* Desenvolvimento Backend;
* Desenvolvimento de APIs REST;
* Modelagem de Banco de Dados;
* PostgreSQL;
* Segurança da Informação;
* Desenvolvimento Web;
* Testes Automatizados;
* Docker;
* CI/CD;
* Data Analytics;
* Business Intelligence;
* Machine Learning;
* Inteligência Artificial.

---

# 📌 Próximo Passo

O desenvolvimento será iniciado pela **Engenharia de Requisitos**, utilizando o **SRS (Software Requirements Specification)** como documento central para orientar as próximas fases.

A sequência planejada é:

```text
SRS
 ↓
Requisitos Funcionais e Não Funcionais
 ↓
User Stories
 ↓
Casos de Uso
 ↓
Critérios de Aceitação
 ↓
Matriz de Rastreabilidade
 ↓
Arquitetura
 ↓
Banco de Dados
 ↓
Desenvolvimento
```

---

## 📄 Licença

Projeto em desenvolvimento para fins de estudo, portfólio e evolução profissional.

A definição da licença definitiva será realizada posteriormente.

---

**SST Control — Transformando processos de SST em dados, controle e inteligência.**

> 🚧 Projeto em desenvolvimento.


