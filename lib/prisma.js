const { PrismaClient } = require('@prisma/client');
const { PrismaPg } = require('@prisma/adapter-pg');

const globalStore = globalThis;

function createPrismaClient() {
  if (!process.env.DATABASE_URL) {
    throw new Error('DATABASE_URL is not configured.');
  }

  const adapter = new PrismaPg({
    connectionString: process.env.DATABASE_URL,
  });

  return new PrismaClient({ adapter });
}

const prisma = globalStore.__welcPrisma || createPrismaClient();

if (process.env.NODE_ENV !== 'production') {
  globalStore.__welcPrisma = prisma;
}

module.exports = { prisma };
